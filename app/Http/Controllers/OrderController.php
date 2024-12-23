<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderItemResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    use apiResponse;
    public function getAllOrders(){
        $orders = OrderResource::collection(Order::all());
        return $this->apiResponse($orders, 'get all orders successfully', 200);
    }

    public function getAllUserOrders(){
        $orders = OrderResource::collection(Order::where('user_id', auth()->user()->id)->get());
        return $this->apiResponse($orders,'get all user orders successfully',200);
    }

    public function getOrderDetails($id){
        $order = Order::where('user_id', auth()->user()->id)->where('id', $id)->first();
        if(!$order){
            return $this->apiResponse(null, 'order not found',404);
        }

        $order_details = [
            'Order id'=>$order->id,
            'order items'=> OrderItemResource::collection($order->orderItems),
            'total price'=> $order->total_price,
            'status' => $order->status,
            'address' => $order->address,
        ];

        return $this->apiResponse($order_details , 'get order successfully',200);
    }
    
    public function createOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'products' => 'required|array', 
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $new_order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'pending',
            'total_price' => 0,
            'address' => auth()->user()->location,
        ]);

        $total_price = 0;

        foreach ($request->products as $product_data) {
            $product = Product::find($product_data['product_id']);

            if ($product->available_quantity < $product_data['quantity']) {
                return $this->apiResponse(null, "Not enough quantity of product ID {$product_data['product_id']}", 400);
            }

            $order_item = OrderItem::create([
                'order_id' => $new_order->id,
                'product_id' => $product_data['product_id'],
                'quantity' => $product_data['quantity'],
                'price' => $product->price * $product_data['quantity'],
            ]);
 
            $product->available_quantity -= $product_data['quantity'];
            $product->save();

            $total_price += $product->price * $product_data['quantity'];
        }

        $new_order->total_price += $total_price;
        $new_order->save();

        $order_details = [
            'Order id'=>$new_order->id,
            'order items'=> OrderItemResource::collection($new_order->orderItems),
            'total price'=> $new_order->total_price,
            'status' => $new_order->status,
            'address' => $new_order->address,
        ];

        return $this->apiResponse($order_details, 'Order created successfully', 201);
    }

    public function updateOrderItem(Request $request){

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $order = Order::where('user_id', auth()->user()->id)->where('id',$request->order_id)->first();

        if (!$order) {
            return $this->apiResponse(null, 'Order for another user', 404);
        }

        if($order->status != 'pending') {
            return $this->apiResponse(null, "can't update", 400);
        }

        $product = Product::where('id', $request->product_id)->first();
        $order_item = OrderItem::where('order_id', $order->id)->where('product_id', $request->product_id)->first();
            
        if (!$order_item) {
            return $this->apiResponse(null, 'Product not exist in this order', 404);
        }

        if($order_item->quantity == $request->quantity) {
            return $this->apiResponse(null, 'no change', 200);
        }


        if($order_item->quantity > $request->quantity) {
            $def = $order_item->quantity - $request->quantity;
            $order_item->quantity = $request->quantity;
            $order_item->price = $product->price * $request->quantity;
            $order_item->save();

            $order->total_price -= $product->price * $def;
            $order->save();

            $product->available_quantity += $def;
            $product->save();

            return $this->apiResponse(new OrderItemResource($order_item), 'Item updated successfully', 200);
        }


        $def = $request->quantity - $order_item->quantity;
        if ($product->available_quantity < $def) {
            return $this->apiResponse(null, 'Not enough quantity', 400);
        }

        $order_item->quantity = $request->quantity;
        $order_item->price = $product->price * $request->quantity;
        $order_item->save();

        $order->total_price += $product->price * $def;
        $order->save();

        $product->available_quantity -= $def;
        $product->save();

        return $this->apiResponse(new OrderItemResource($order_item), 'Item updated successfully', 200);

    }

    public function deleteOrderItem(Request $request){

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $order = Order::where('user_id', auth()->user()->id)->where('id',$request->order_id)->first();

        if (!$order) {
            return $this->apiResponse(null, 'Order for another user', 404);
        }

        if($order->status != 'pending') {
            return $this->apiResponse(null, "can't delete", 400) ;
        }

        $product = Product::where('id', $request->product_id)->first();
        $order_item = OrderItem::where('order_id', $order->id)->where('product_id', $request->product_id)->first();
            
        if (!$order_item) {
            return $this->apiResponse(null, 'Product not exist in this order', 404);
        }

        $product->available_quantity += $order_item->quantity;
        $product->save();

        $order->total_price -= $order_item->price;
        $order->save();

        $order_item->delete();

        if($order->total_price == 0){
            $order->delete();
        }

        return $this->apiResponse(new OrderResource($order), 'Item deleted successfully',200);

    }

    public function updateOrder(Request $request){

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $order = Order::where('user_id', auth()->user()->id)->where('id',$request->order_id)->first();

        if (!$order) {
            return $this->apiResponse(null, 'Order for another user', 404);
        }
        
        if($order->status != 'pending'){
    
            return $this->apiResponse(null, "Order can't update", 400);
        }

        if($order->address === $request->address){
            return $this->apiResponse(null,'no change to update',200);
        }

        $order->address = $request->address;
        $order->save();

        return $this->apiResponse(new OrderResource($order), 'Order updated successfully', 200);
    }

    public function changeOrderStatus(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $order = Order::where('user_id', $request->user_id)->where('id',$request->order_id)->first();

        if (!$order) {
            return $this->apiResponse(null, 'Order for another user', 404);
        }

        $order->status = $request->status;
        $order->save();

        return $this->apiResponse(new OrderResource($order), 'Order updated successfully', 200);
    }

    public function deleteOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $order = Order::where('user_id', auth()->user()->id)->where('id',$request->order_id)->first();

        if (!$order) {
            return $this->apiResponse(null, 'Order for another user', 404);
        }
        
        if($order->status != 'pending'){
    
            return $this->apiResponse(null, "Order can't delete", 400);
        }
        $order_items = OrderItem::where('order_id', $request->order_id)->get();

        foreach($order_items as $order_item){
            $product = Product::where('id', $order_item->product_id)->first();
            $product->available_quantity += $order_item->quantity;
            $product->save();
        }

        $order->delete();
        return $this->apiResponse([], 'Order deleted successfully', 200);
    }
}