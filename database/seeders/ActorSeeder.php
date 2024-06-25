<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actor::create(['name' => 'Brad', 'last_name' => 'Pitt']);
        Actor::create(['name' => 'Leonardo', 'last_name' => 'DiCaprio']);
        Actor::create(['name' => 'Tom', 'last_name' => 'Hanks']);
        Actor::create(['name' => 'Robert', 'last_name' => 'De Niro']);
    }
}