<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
//        'img',
        'price',
        'category_id'
    ];

    function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
