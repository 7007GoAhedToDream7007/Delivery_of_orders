<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    use ApiResponse;
    public function addFavorite(Request $request){
        $user_id=auth()->user()->id;;
        $validator=Validator::make($request->all(),[
            'product_id'=>'required'
        ]);
        if ($validator->fails())
            return $this->apiResponse(null,$validator->errors(),400);
        $product = Product::where('id',$request->product_id)->first();
        if(!$product)
            return $this->apiResponse(null,'the product not found',404);
        $product_favorite = Favorite::where('user_id',$user_id)->where('product_id',$request->product_id)->first();
        if($product_favorite)
            return $this->apiResponse(null,'this favorite product already added',404);

        $favorite=Favorite::create([
            'user_id'=>$user_id,
            'product_id' => $request->product_id,
        ]);
        return $this->apiResponse(null,'add favorite successfully',201);
    }
    public function getAllFavorites()
    {
        $user_id = auth()->user()->id;
        $checkIsEmpty = Favorite::where('user_id',$user_id)->first();
        if(!$checkIsEmpty)
            return $this->apiResponse(null,'The favorite products list is empty',404);
        $products = Favorite::where('user_id',$user_id)->get();
        foreach ($products as $favorite) {
           $product_id = $favorite['product_id'];
            $favorites []  = ProductResource::collection(
                Product::where('id',$product_id)->get()
            );
        }
        return $this->apiResponse($favorites,'get all favorite products successfully',200);
    }

    public function deleteFavorite(Request $request)
    {
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(),[
            'product_id'=>'required',
        ]);
        $product = Product::where('id',$request->product_id)->first();
        if(!$product)
            return $this->apiResponse(null,'the product not found',404);
        if($validator->fails())
            return $this->apiResponse(null,$validator->errors(),400);
        $product = Product::where('id',$request->product_id)->first();
        if(!$product)
            return $this->apiResponse(null,'the product not found',404);
        $product_favorite = Favorite::where('user_id',$user_id)->where('product_id',$request->product_id)->first();
        if(!$product_favorite)
            return $this->apiResponse(null,'This product is not found in the favorites list',404);

        Favorite::where('user_id',$user_id)->where('product_id',$request->product_id)->delete();
        return $this->apiResponse(null,' deleted favorite successfully',200);
    }

}

