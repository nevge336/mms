<?php

namespace Database\Factories;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'content' => $this->faker->text(2000),
            'title_fr' => $this->faker->words(3, true),
            'content_fr' => $this->faker->text(2000),
            'date' => $this->faker->date(),
            'user_id' => User::factory(),
        ];
    }
}