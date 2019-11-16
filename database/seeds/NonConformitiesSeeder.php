<?php

use App\NonConformities;
use Illuminate\Database\Seeder;

class NonConformitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NonConformities::class, 10)->create();
    }
}