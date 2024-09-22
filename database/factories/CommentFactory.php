<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraph(1),
            // 'comment_id' => \App\Models\Comment::factory(),
            'user_id' => \App\Models\User::factory(),
            'post_id' => \App\Models\Post::factory(),
        ];
    }
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'comment_id' => null,
    //     ]);
    // }
}
