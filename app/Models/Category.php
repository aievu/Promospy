<?php

namespace App\Models;

use App\Enums\ProductCategoryEnum;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\Cast\String_;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    
    public function getCategoryLabelAttribute(): String
    {
        return ProductCategoryEnum::fromValue($this->id)?->label() ?? '<i class="fa-regular fa-circle-question"></i>Unknown';
    }
}