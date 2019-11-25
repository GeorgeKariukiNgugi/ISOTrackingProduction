<?php

use Illuminate\Database\Seeder;
use App\KeyPerfomaceIndicator;
class emsKPI extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kpis = [
            [
                'name'=>'Reduce electricity consumption of 141,499 MWh by 2 %. This considers increase in the number of sites',
                'strategic_objective_id'=>'35',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'34675',
            ],
            [
                'name'=>'Reduce diesel consumption (gensets) of 9,639,517 L by 5 %  (This considers increase in the number of sites)',
                'strategic_objective_id'=>'35',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'2361682',
            ],
            [
                'name'=>'Reduce carbon emission of 63,685 tCO2e by 4 %',
                'strategic_objective_id'=>'35',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'15285',
            ],
            [
                'name'=>'Reduce water consumption of 91,449 m3 by 2 %',
                'strategic_objective_id'=>'35',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'22405',
            ],
            [
                'name'=>'Reduce solid waste to dumpsites from the main corporate facilities by 90%',
                'strategic_objective_id'=>'35',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'23',
            ],
            [
                'name'=>'Number of internal audits carried out for ISO14001 within the financial year ',
                'strategic_objective_id'=>'35',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'1',
            ],
            [
                'name'=>'Conduct mandatory Regulatory Environmental audits for all BTS sites constructed ln the previous year, Retail centres, MSRs and main corporate offices - 325 sites.',
                'strategic_objective_id'=>'36',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'81.25',
            ],
            [
                'name'=>'Noise Zero tolerance for non-Compliance on Enviromental standards',
                'strategic_objective_id'=>'36',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'0',
            ],
            [
                'name'=>'EMF Zero tolerance for non-Compliance on Enviromental standards',
                'strategic_objective_id'=>'36',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'0',
            ],
            [
                'name'=>'Air Quality Zero tolerance for non-Compliance on Enviromental standards',
                'strategic_objective_id'=>'36',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'0',
            ],
            [
                'name'=>'Staff awareness campaigns carried out in the year (4)',
                'strategic_objective_id'=>'37',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'1',
            ],
            [
                'name'=>'Increase volume of E-Waste collected from 223 tonnes by 20%',
                'strategic_objective_id'=>'37',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'67',
            ],
            [
                'name'=>'Training sessions carried on to our staff on ISO14001',
                'strategic_objective_id'=>'37',
                'perspective_id'=>'13',
                'arithmeticStructure'=>'1',
                'target'=>'67',
            ],
        ];

        foreach ($kpis as $key => $value) {
            KeyPerfomaceIndicator::create($value);
        }
    }
}
