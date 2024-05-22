<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['name','phone','address','address','total','quantity','status','user_id','payment'];
    // public function products(){
    //     return $this->hasMany(Products::class,'product_id','products_id');
    // }
    public function order(){
        return $this->hasMany(ProductOrder::class);
    }
}
