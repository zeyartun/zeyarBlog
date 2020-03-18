<?php

use Illuminate\Database\Seeder;
use App\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
    	$faker = Faker\Factory::create();

       for ($i=0; $i < 50; $i++) { 
       		$post = new post();
       		$post->cat_ID = rand(1, 9);
          $post->postTitle = $faker->text('10');
          $post->postContent = $faker->text('500');
          $post->user_ID = rand(1, 4);
          $post->save();
       }
    }
}
