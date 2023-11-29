<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Modules\Comment\app\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PostSeeder::class,
            AdminSeeder::class,
            DefaultData::class,
            UserSeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            CommentSeeder::class
        ]);
        // Comment::factory(10)->create();
   
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
