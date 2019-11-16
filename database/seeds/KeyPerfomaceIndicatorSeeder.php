<?php

use App\KeyPerfomaceIndicator;
use Illuminate\Database\Seeder;

class KeyPerfomaceIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(KeyPerfomaceIndicator::class, 10)->create();
    }
}