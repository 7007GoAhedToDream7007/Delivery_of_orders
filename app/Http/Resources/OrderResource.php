<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($request->is('api/get_all_orders')){
            return[
                'user_id' => $this->user_id,
                'status' => $this->status,
                'total_price' => $this->total_price,
                'address' => $this->address,
            ];
        }

        return[
            'status' => $this->status,
            'total_price' => $this->total_price,
            'address' => $this->address,
        ];

    }
}
