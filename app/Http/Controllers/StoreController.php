<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    use apiResponse;
    public function getAllStores()
    {
        $stores = StoreResource::collection(Store::all());

        return $this->apiResponse($stores,'get all stores successfully',201);
    }


    public function searchStore(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'store_name'=>'required'
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $search = $request->store_name;
        $store = Store::where(function ($query) use ($search) {
            $query->where('store_name', 'like', "%$search%");
        })->get();
        return $this->apiResponse($store, 'successfully', 200);
    }

    public function createStore(Request $request){
        $validator=Validator::make($request->all(),[
            'store_name'=>'required|string|unique:stores',
            'store_description' => 'required|string',
            'store_Image' => 'required',
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $store=Store::create($request->all());
        return  $this->apiResponse($store,'created new store successfully',201);
    }
    public function deleteStore($id){
        $store=Store::find($id);
        if (!$store)
            return $this->apiResponse(null,'The store not found',404);
        $store->delete($id);
        return $this->apiResponse(null,'deleted store successfully',200);

    }



}
