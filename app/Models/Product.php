<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'store_id',
        'product_description',
        'available_quantity',
        'price',
        'product_Image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
    public function favorites(){
        return $this->HasMany(Favorite::class);
    }
    public function orderItems() { 
        return $this->hasMany(OrderItem::class); 
    }

}
