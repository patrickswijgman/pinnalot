<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< Updated upstream
        // $this->call(UsersTableSeeder::class);
=======
        Model::unguard();
        $this->call(GroupTypeSeeder::class);
        $this->call(MdlColorsSeeder::class);
        $this->call(SettingsDefaultSeeder::class);
        $this->call(UsersSeeder::class);
        Model::reguard();
>>>>>>> Stashed changes
    }
}
