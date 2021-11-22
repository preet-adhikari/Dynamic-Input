<?php

namespace Database\Factories;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\Post;
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
    public function definition(): array
    {
        return [
            'blogger_id' => Blogger::factory(),
            'category_id' => Category::factory(),
            'title' => ucfirst($this->faker->word()),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph()

        ];
    }
}
