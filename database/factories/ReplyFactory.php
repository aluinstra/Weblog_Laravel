<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text($maxNbChars = 200),
            'user_id' => User::all()->random(),

        ];
    }


    public function configure()
    {
        return $this
            ->afterCreating(function (Reply $reply) {
                $post = $reply->post;
                // $post = Post::find($reply->post_id);
                // dd($post);
                $reply->created_at = $this->faker->dateTimeBetween($post->created_at, 'now');
                $reply->save();
            });
    }
}
