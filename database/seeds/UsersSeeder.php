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
            $users = [];
            $name = $faker->name;
            $password = bcrypt('password');
            $userData = UserData::create(['firstname' => $name]);
            $users[] = [
                'name' => $name,
                'email' => $faker->unique()->email,
                'password' => $password,
                'userData' => $userData->id
            ];

            User::insert($users);
        }
    }
}
