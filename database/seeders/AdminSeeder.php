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
        $user = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ],
        [
            'first_name' => 'Admin',
            'last_name' => '...',
            'password' => bcrypt('admin123'),
        ]);

        $rule = Rule::firstOrCreate([
            'name' => 'admin',
        ],
        [
            'description' => 'admin rule',
        ]);

        UserRule::firstOrCreate([
            'user_id' => $user->id,
            'rule_id' => $rule->id,
        ]);
    }
}
