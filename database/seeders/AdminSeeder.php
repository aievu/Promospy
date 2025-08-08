<?php

namespace Database\Seeders;

use App\Models\Rule;
use App\Models\User;
use App\Models\UserRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => '...',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        Rule::create([
            'name' => 'admin',
            'description' => 'admin rule',
        ]);

        UserRule::create([
            'user_id' => 1,
            'rule_id' => 1,
        ]);
    }
}
