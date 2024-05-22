<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    // name	image	description	size	price	quantity	note_use	category_id
    protected $fillable = ['name','email','subject','message','answer'];
}
