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
            
            AdminSeeder::class,
            DefaultData::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
            
            PostSeeder::class,
        ]);
        // Comment::factory(10)->create();
   
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
