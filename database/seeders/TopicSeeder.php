<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Post;


use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = ['tuinieren', 'vervoer', 'huishoudelijk', 'dieren'];

        foreach ($topics as $topic) {
            // dd($topic);
            Topic::create(['topic' => $topic]);
        }
    }
}
