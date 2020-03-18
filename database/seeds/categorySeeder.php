<?php

use Illuminate\Database\Seeder;
use App\postCategory;
class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

       for ($i=0; $i < 9; $i++) { 
       		$post = new postCategory();
            $post->catName = $faker->text('10');
            $post->user_ID = rand(1, 3);
            $post->save();
       }
    }
}
