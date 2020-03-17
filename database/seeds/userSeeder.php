<?php

use Illuminate\Database\Seeder;
use App\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();

        for ($i = 0; $i < 4; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = "mgmg$i@bm.com";
            $user->email_verified_at = now();
            $user->password = bcrypt('password'); // password
            $user->save();
        }
    }
}
