<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Eletronic',
            'Fashion',
            'Home and Decoration',
            'Beauty and Self Care',
            'Gift Card',
            'Sports',
        ];

        foreach($categories as $name) {
            Category::firstOrCreate([
                'name' => $name,
                'description' => $name . ' Category',
        ]);
        }
    }
}
