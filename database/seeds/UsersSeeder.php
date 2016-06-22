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
        $password = bcrypt('password');
        $users = [];
        $userData = [];

        foreach (range(1,10000) as $index) {
            $name = $faker->name;
            $userData[] = [
              'firstname' => $name
            ];
            $users[] = [
                'name' => $name,
                'email' => $faker->unique()->email,
                'password' => $password,
                'userData' => $index
            ];
        }

        UserData::insert($userData);
        User::insert($users);
    }
}
