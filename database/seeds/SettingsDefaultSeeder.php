<?php

use App\Models\SettingsDefault;
use Illuminate\Database\Seeder;

class SettingsDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingsDefault::create(['primary_color' => 'blue_grey', 'accent_color' => 'red', 'landing_page' => 'home']);
    }
}
