<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Director::create(['name' => 'Steven', 'last_name' => 'Spielberg']);
        Director::create(['name' => 'Quentin', 'last_name' => 'Tarantino']);
        Director::create(['name' => 'Christopher', 'last_name' => 'Nolan']);
        Director::create(['name' => 'Martin', 'last_name' => 'Scorsese']);
    }
}