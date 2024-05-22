<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductOrder extends Model
{
    use HasFactory;
    protected $table = 'product_order';
    protected $fillable = ['order_id','product_id','quantity','total'];
    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
