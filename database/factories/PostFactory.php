<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(4),
            'approved_at' => now(),
            'user_id' => User::factory()->create()->id,
        ];
    }

    /**
     * Indicate that the post should not be approved.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unapproved()
    {
        return $this->state(function (array $attributes) {
            return [
                'approved_at' => null,
            ];
        });
    }
}
