<?php

use App\StrategicObjective;
use Illuminate\Database\Seeder;

class StrategicObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StrategicObjective::class, 10)->create();
    }
}