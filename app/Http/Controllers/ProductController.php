<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use apiResponse;
    public function getAllProducts()
    {
        $products = ProductResource::collection(Product::all());
        return $this->apiResponse($products,'get all product successfully',201);
    }

    public function getAllProductStores($id)
    {
        $store = Store::find($id);
        if (!$store)
            return $this->apiResponse(null,'the store not found',404);
        $products = ProductResource::collection($store->products);
        return $this->apiResponse($products,'get all product store successfully',201);
    }


    public function searchProduct(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'product_name'=>'required'
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $search = $request->product_name;

        $products = ProductResource::collection(
             Product::where(function ($query) use ($search) {
                $query->where('product_name', 'like', "%$search%");
            })->get()
        );
        return $this->apiResponse($products, 'successfully', 200);
    }

    public function createProduct(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|string',
            'store_name'=>'required|string',
            'product_description'=>'required|string',
            'available_quantity'=>'required|integer',
            'price'=>'required|integer',
            'product_Image' => 'required',
        ]);
        if ($validator->fails())
            return $this->apiResponse(null,$validator->errors(),400);
        $store_name = Store::where('store_name',$request->store_name)->pluck('store_name')->first();
        if(!$store_name)
            return $this->apiResponse(null,'the store is not found',404);
        $store_id = Store::where('store_name',$request->store_name)->pluck('id')->first();
        $product = Product::create([
            'store_id' => $store_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'available_quantity' => $request->available_quantity,
            'price' => $request->price,
            'product_Image' => $request->product_Image,

        ]);
        return $this->apiResponse($product,'created new product successfully',201);
    }



}
