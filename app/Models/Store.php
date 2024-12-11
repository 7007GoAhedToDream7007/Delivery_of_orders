<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model

{
    protected $fillable = [
        'store_name',
        'store_description',
        'store_Image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

}
