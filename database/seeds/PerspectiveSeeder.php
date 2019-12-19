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
        // factory(Perspective::class, 10)->create();

        //! IT SERVICE MANAGEMENT PERPECTIVES.
        $perspective = [
            [
                'name'=>'itsms_financial_perspective',
                'weight'=> '10',
                'program_id'=> '1'
            ],
            [
                'name'=>'itsms_customer_perspective',
                'weight'=>'35',
                'program_id'=> '1'
            ],
            [
                'name'=>'itsms_internal_business_process_perspective',
                'weight'=>'50',
                'program_id'=> '1'
            ],
            [
                'name'=>'itsms_learning_and_growth',
                'weight'=>'5',
                'program_id'=> '1'
            ],

            //! QUALITY MANAGEMENT PERSPECTIVES.

            [
                'name'=>'qms_financial_perspective',
                'weight'=> '30',
                'program_id'=> '5'
            ],
            [
                'name'=>'qms_customer_perspective',
                'weight'=>'50',
                'program_id'=> '5'
            ],
            [
                'name'=>'qms_internal_business_process_perspective',
                'weight'=>'10',
                'program_id'=> '5'
            ],
            [
                'name'=>'qms_learning_and_growth',
                'weight'=>'10',
                'program_id'=> '5'
            ],

            //! INFORMATION SECURITY PERSPECTIVE.

            [
                'name'=>'isms_financial_perspective',
                'weight'=> '20',
                'program_id'=> '3'
                
            ],
            [
                'name'=>'isms_customer_perspective',
                'weight'=>'25',
                'program_id'=> '3'
            ],
            [
                'name'=>'isms_internal_business_process_perspective',
                'weight'=>'35',
                'program_id'=> '3'
            ],
            [
                'name'=>'isms_learning_and_growth',
                'weight'=>'20',
                'program_id'=> '3'
            ],
        ];
    
    
            foreach( $perspective as  $key => $value){
                Perspective::create($value);
            }
    }
}