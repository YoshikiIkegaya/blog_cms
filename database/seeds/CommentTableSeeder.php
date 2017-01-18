<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Comment;
use App\Models\Post;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      $maxComments = mt_rand(3, 15);
      for ($j=0; $j < $maxComments; $j++) {
        $post = Post::find(mt_rand(1, Post::count()));
        Comment::create([
          'post_id' => $post->id,
          'commenter' => $faker->numerify('Commenter ###'),
          'comment' => substr($faker->numerify('Comment ###'), 0, 120),
          'email' => $faker->email,
          'approved' => 1
        ]);
        $post->increment('comment_count');
      }
    }
}
