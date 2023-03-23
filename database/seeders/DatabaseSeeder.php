<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Database\Factories\ProfileFactory;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Storage::deleteDirectory('articles');
        Storage::deleteDirectory('categories');
        
        Storage::makeDirectory('articles');
        Storage::makeDirectory('categories');

        $this->call(UserSeeder::class);
        Categories::factory(10)->create();
        Articles::factory(10)->create();
        Comment::factory(10)->create();
  

    }
}
