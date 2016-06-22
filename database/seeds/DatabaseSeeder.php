<?php

use Illuminate\Database\Eloquent\Model;
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


        // $this->call(UsersTableSeeder::class);



        Model::unguard();
        $this->call(GroupTypeSeeder::class);
        $this->call(MdlColorsSeeder::class);
        $this->call(SettingsDefaultSeeder::class);
        $this->call(CountriesSeeder::class);

        $this->call(UsersSeeder::class);
        Model::reguard();
        
    }
}
