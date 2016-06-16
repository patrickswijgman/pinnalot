<?php

use App\Models\UserData;
use App\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10000) as $index) {
            $name = $faker->name;
            $userData = UserData::create(['firstname' => $name]);
            DB::table('users')->insert([
                'name' => $name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'userData' => $userData->id
            ]);
        }
    }
}
