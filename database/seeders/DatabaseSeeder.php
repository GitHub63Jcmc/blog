<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        // Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');


        User::factory()->create([
            'name' => 'Victor Arana',
            'email' => 'victor@codersfree.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(5)->create();

        Category::factory(10)->create();
        Post::factory(100)->create();

        $this->call([
            PermissionSeeder::class
        ]);
    }
}
