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

        foreach (range(1,10000) as $index) {
            $name = $faker->name;
            UserData::insert([
                'firstname' => $name
            ]);
            $users[] = [
                'name' => $name,
                'email' => $faker->unique()->email,
                'password' => $password,
                'userData' => $index
            ];
        }
        
        User::insert($users);
    }
}
