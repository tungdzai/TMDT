<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // name	image	description	size	price	quantity	note_use	category_id
    protected $fillable = ['id','name','image','description','size','price','quantity','note_use','category_id'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
