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
            //
            // 'user_id' => User::all()->random()->id,     //relate the 'user_id' with the User model(foreign key), select from already created user
            'user_id' => User::factory(),     //relate the 'user_id' with the User model(foreign key), create user when a post is created
            'title' => $this->faker->sentence,
            'post_image' => $this->faker->imageUrl(900, 300),
            'body' => $this->faker->paragraph,
        ];
    }
}
