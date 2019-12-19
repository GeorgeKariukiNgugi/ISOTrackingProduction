<?php

use App\KeyPerfomanceIndicatorScore;
use Illuminate\Database\Seeder;

class KeyPerfomanceIndicatorScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(KeyPerfomanceIndicatorScore::class, 10)->create();
    }
}