<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'sale_url',
        'image_url',
        'price',
        'user_id',
        'category_id'
    ];
}
