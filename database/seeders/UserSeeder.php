<?php

namespace Database\Seeders;

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
            ->has(Post::factory()->rand(1, 3))
            ->has(Reply::factory()->rand(0, 5))
            ->create();
    }
}
