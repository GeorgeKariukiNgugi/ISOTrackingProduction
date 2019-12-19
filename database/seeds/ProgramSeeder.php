<?php

use App\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Program::class, 10)->create();

        $programs = [
            [
                'name'=>'Information Technology Service Management System',
                'shortHand'=>'ITSMS'
            ],
            [
                'name'=>'Business Contuinity Management System',
                'shortHand'=>'BCSMS'
            ],
            [
                'name'=>'Information Security Management System',
                'shortHand'=>'ISMS'
            ],
            [
                'name'=>'Environmental Manaement System',
                'shortHand'=>'EMS'
            ],
            [
                'name'=>'Quality Management System',
                'shortHand'=>'BCSMS'
            ],
        ];

        foreach($programs as $key => $value){

            Program::create($value);

        }
    }
}