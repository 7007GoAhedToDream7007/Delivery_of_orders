<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable=[
        'user_id',
        'product_id'
    ];
    protected $hidden=[
        'updated_at',
        'created_at'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
