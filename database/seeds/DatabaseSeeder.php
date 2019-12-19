<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KeyPerfomanceIndicatorScoreSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(PerspectiveSeeder::class);
        $this->call(StrategicObjectiveSeeder::class);
        $this->call(KeyPerfomaceIndicatorSeeder::class);
        $this->call(NonConformitiesSeeder::class);
    }
}