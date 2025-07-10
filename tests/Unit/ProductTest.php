<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product_successfully()
    {
        $user = User::factory()->create();

        $product = Product::create([
            'name' => 'Smartphone X',
            'description' => 'Um ótimo smartphone.',
            'slug' => 'smartphone-x',
            'sale_url' => 'https://exemplo.com/produto',
            'image_url' => 'https://exemplo.com/imagem.jpg',
            'price' => 1999.99,
            'user_id' => $user->id,
            'category_id' => 1,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Smartphone X',
            'slug' => 'smartphone-x',
            'price' => 1999.99
        ]);
    }
}
