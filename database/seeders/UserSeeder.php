<?php

namespace Database\Seeders;

use Faker;

use App\Models\User;
use App\Models\Post;
use App\Models\Reply;


use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(50)
            ->create();

        $users = User::all();

        foreach ($users as $user) {
            Post::factory()
                ->for(User::factory())
                ->count(rand(1, 5))
                ->create(['user_id' => $user->id]);
        }

        $posts = Post::all();

        // $count = 1;
        /** 1 min er bij; */
        $faker = Faker\Factory::create();

        foreach ($posts as $post) {
            Reply::factory()
                ->for(Post::factory())
                ->count(rand(0, 10))
                ->create(['post_id' => $post->id]);
        }
    }
}

/** 
 *pas hierboven reply factory aan waarbij datum van post wordt
 *genomen en hierbij per loop een minuut wordt opgeteld

 * 'created_at' => $faker->dateTimeBetween($post->created_at, 'now')]

 *https://laracasts.com/discuss/channels/general-discussion/random-startend-date-seeder-problem?page=0
 */
