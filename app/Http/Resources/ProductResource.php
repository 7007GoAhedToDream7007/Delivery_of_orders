<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($request->is('api/get_all_products')){
            return [
                'id' => $this->id,
                'product_name' => $this->product_name,
                'product_Image' => $this->product_Image,
                'price' => $this->price,
            ];
        }
        
        
        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'product_Image' => $this->product_Image,
            'price' => $this->price,
        ];
    }
}
