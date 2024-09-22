<?php

namespace Database\Seeders;

// use App\Models\user;
use App\Models\user;
use App\Models\post;
use App\Models\comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;
use Random\Randomizer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)
        //     ->has(Post::factory()->count(10, 20))->create
        //     ->has(Comment::factory()->count(20, 50)
        //     ->has(Comment::factory()->count(3, 10))))
        //     ->create();


        // $user = User::factory()->create();

        // $posts =Post::factory()
        // ->for($user = User::factory()->create();)
        //     ->create();

        // $comment = Comment::factory()
        // ->for(Post::factory()
        // ->for($user = User::factory()->create())
        //     ->create())
        //     ->create();

        // $replies = Comment::factory()
        //     ->count(3, 5)
            // Comment::factory()
            // ->for(Post::factory()
            // ->for(User::factory()
            // ->create())
            // ->create())
            // ->create();

        // user::factory(1)->create();
        // post::factory(1)->create();
        // comment::factory(20)->create();

        // Comment::factory()
        // ->has(Comment::factory()->count(3, 10))
        // ->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
