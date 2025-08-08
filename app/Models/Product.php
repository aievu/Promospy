<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductCategoryEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'category_id',
        'sold_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function lastComments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest()->take(3);
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
