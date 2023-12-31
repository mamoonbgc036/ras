<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $table->unsignedBigInteger('user_id');
            // $table->string('name');
            // $table->string('image');
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
