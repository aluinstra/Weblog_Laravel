<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
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
            // 'user_id' => User::factory(), // maakt voor elke post een user_id
            'title' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'content' => $this->faker->text($maxNbChars = 250),
            'premium_content' => $this->faker->boolean(),
            'topic_id' => Topic::all()->random(),
            'active' => 1,
            'created_at' => $this->faker->dateTimeBetween($startDate = '-1 years')
        ];
    }
}
// $endDate = '-1 month'
