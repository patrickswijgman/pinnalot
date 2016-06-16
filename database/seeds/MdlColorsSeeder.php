<?php

use App\Models\MdlColor;
use Illuminate\Database\Seeder;

class MdlColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MdlColor::create(['value' => 'deep_orange', 'name' => 'Deep Orange']);
        MdlColor::create(['value' => 'red', 'name' => 'Red']);
        MdlColor::create(['value' => 'pink', 'name' => 'Pink']);
        MdlColor::create(['value' => 'purple', 'name' => 'Purple']);
        MdlColor::create(['value' => 'deep_purple', 'name' => 'Deep Purple']);
        MdlColor::create(['value' => 'indigo', 'name' => 'Indigo']);
        MdlColor::create(['value' => 'blue', 'name' => 'Blue']);
        MdlColor::create(['value' => 'light_blue', 'name' => 'Light Blue']);
        MdlColor::create(['value' => 'cyan', 'name' => 'Cyan']);
        MdlColor::create(['value' => 'teal', 'name' => 'Teal']);
        MdlColor::create(['value' => 'green', 'name' => 'Green']);
        MdlColor::create(['value' => 'light_green', 'name' => 'Light Green']);
        MdlColor::create(['value' => 'lime', 'name' => 'Lime']);
        MdlColor::create(['value' => 'yellow', 'name' => 'Yellow']);
        MdlColor::create(['value' => 'amber', 'name' => 'Amber']);
        MdlColor::create(['value' => 'orange', 'name' => 'Orange']);
        MdlColor::create(['value' => 'blue_grey', 'name' => 'Blue Grey']);
    }
}
