<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Victor Arana',
            'email' => 'victor@codersfree.com',
            'password' => bcrypt('12345678')
        ]);

        Category::factory(10)->create();
        Post::factory(100)->create();
    }
}
