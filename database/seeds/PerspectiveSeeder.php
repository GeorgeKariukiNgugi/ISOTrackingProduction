<?php

use App\Perspective;
use Illuminate\Database\Seeder;

class PerspectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Perspective::class, 10)->create();
    }
}