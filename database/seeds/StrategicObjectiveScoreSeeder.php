<?php

use App\StrategicObjectiveScore;
use Illuminate\Database\Seeder;

class StrategicObjectiveScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StrategicObjectiveScore::class, 10)->create();
    }
}