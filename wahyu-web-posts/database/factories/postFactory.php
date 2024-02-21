<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 16,
            'category_id' => mt_rand(1, 3),
            'title' => $this->faker->sentence(mt_rand(1, 5)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(1, 7)),
            // 'body' => '<p>' . implode('</p><p>' . $this->faker->paragraphs(mt_rand(1, 10))) . '</p>'
            'body' => collect($this->faker->sentences(mt_rand(5, 10)))->map(fn ($post) => "<p>$post</p>")->implode('')
        ];
    }
}
