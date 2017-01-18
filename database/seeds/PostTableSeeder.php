<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i=1; $i <= 20; $i++) {
        $content = $faker->numerify('Comment ###');
        Post::create([
          'title' => $faker->numerify($i . '番目の投稿 ###'),
          'author_id' => 1,
          'read_more' => substr($content, 0, 120),
          'content' => $content
        ]);
      }
    }
}
