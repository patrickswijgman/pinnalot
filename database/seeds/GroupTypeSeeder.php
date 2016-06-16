<?php

use App\Models\GroupType;
use Illuminate\Database\Seeder;

class GroupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupType::create(['type' => 'Friends']);
        GroupType::create(['type' => 'Family']);
        GroupType::create(['type' => 'Work']);
        GroupType::create(['type' => 'Project']);
        GroupType::create(['type' => 'Sports']);
        GroupType::create(['type' => 'Music']);
    }
}
