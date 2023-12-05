<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * @return void
     */
    public function run() 
    {
        // User::truncate();
        // Post::truncate();
        // Category::truncate();


        $user = User::factory()->create([
            'name'=>'CCYM'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $user = User::factory()->create();


        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);



        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-family-post', 
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet.</p>',
        //     'body' => '<p>123456789</p>'
        // ]);
        
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Work Post', 
        //     'slug' => 'my-work-post', 
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet.</p>',
        //     'body' => '<p>123456789</p>'
        // ]);

        



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
