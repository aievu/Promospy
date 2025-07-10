<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductCategoryEnum;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favoriteBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function getCategoryLabelAttribute(): String
    {
        return ProductCategoryEnum::fromValue($this->category_id)?->label() ?? 'Unknown';
    }

    public function getCategoryColorAttribute(): String
    {
        return ProductCategoryEnum::fromValue($this->category_id)?->color() ?? 'gray';
    }
}
