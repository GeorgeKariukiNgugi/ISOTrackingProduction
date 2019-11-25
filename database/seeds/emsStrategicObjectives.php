<?php

use Illuminate\Database\Seeder;
use App\StrategicObjective;
class emsStrategicObjectives extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $strategicObjetives = [
            [
                'name'=>'Sustainability',
                'perspective_id'=>'13',
                'shortHand'=>'Sustainability'
            ],
            [
                'name'=>'Regulatory/Customer',
                'perspective_id'=>'13',
                'shortHand'=>'Regulatory/Customer'
            ],
            [
                'name'=>'Organizational Capacity',
                'perspective_id'=>'13',
                'shortHand'=>'Organizational Capacity'
            ],
        ];
        foreach ($strategicObjetives as $key => $value) {
            StrategicObjective::create($value);
        }
        
    }
}
