<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductCategoryEnum;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function highlight()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getCategoryLabelAttribute(): String
    {
        return ProductCategoryEnum::fromValue($this->category_id)?->label() ?? 'Unknown';
    }

    public function getCategoryColorAttribute(): String
    {
        return ProductCategoryEnum::fromValue($this->category_id)?->color() ?? 'rgba(128, 128, 128, 0.5)';
    }
}
