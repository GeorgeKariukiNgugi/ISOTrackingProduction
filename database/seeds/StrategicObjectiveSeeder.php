<?php

use App\StrategicObjective;
use Illuminate\Database\Seeder;

class StrategicObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(StrategicObjective::class, 10)->create();
        $specific_objectives = [

            //!ITSMS STRATEGIC OBJECTIVES.
            [
                'name'=>'financial_namegement',
                'description'=>'Establish and maintain business relationships with customers, identify customer needs, and ensure the organization is able to meet these needs.',        
                'perspective_id'=>'1'
            ],
            [
                'name'=>'business_relationship',
                'description'=>'Provide a framework for optimum financial decision making; design a method of operating the internal investment and financing of an organization.',
                'perspective_id'=> '2',
            ],
            [
                'name'=>'service_desk',
                'description'=>'Support the agreed IT service provision by ensuring the accessibility and availability of the IT Organization and performing various support activities.',
                'perspective_id'=>'2'
            ],
            [
                'name'=>'SLM_Voice_Service_SLA',
                'description'=>' Add Description.',
                'perspective_id'=> '2',
            ], [
                'name'=>'SLM_Mobile_Money_SLA',
                'description'=>'Add Description.',
                'perspective_id'=> '2',
                // 'target'=>''
            ],
             [
                'name'=>'SLM_Mobile_Data_SLA',
                'description'=>'Add Description.',
                'perspective_id'=> '2',
                // 'target'=>''
            ],
            [
                'name'=>'Change Proces',
                'description'=>'Ensure that standardized methods and procedures are used for efficient and prompt handling of all changes to control IT infrastructure, in order to minimize the number and impact of any related incidents upon service',
                'perspective_id'=> '3',                
            ],
            [
                'name'=>'Incident Management',
                'description'=>'Restore a normal service operation as quickly as possible and to minimize the impact on business operations, thus ensuring that the best possible levels of service quality and availability are maintained',
                'perspective_id'=> '3',                
            ],
            [
                'name'=>'Problem Management',
                'description'=>'To prevent problems and resulting incidents from happening, to eliminate recurring incidents, and to minimize the impact of incidents that cannot be prevented',
                'perspective_id'=> '3',                
            ],
            [
                'name'=>'Release Management',
                'description'=>'To plan, schedule and control the movement of releases from test to live environments. This ensures the integrity of the live environment is protected and the correct components are released.',
                'perspective_id'=> '3',                
            ],
            [
                'name'=>'Information Security',
                'description'=>'Ensure the confidentiality, integrity, and availability of an organization information, data and IT services. ',
                'perspective_id'=> '3',                
            ],
            [
                 'name'=>'Capacity Management CPU Utilisation',
                 'description'=>'Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',
                 'perspective_id'=> '3',
                
            ],
            [
                'name'=>'Capacity Management Memory Utilisation',
                'description'=>'Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',
                'perspective_id'=> '3',                
           ],
           [
            'name'=>'Capacity Management License Utilisation',
            'description'=>'Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',
            'perspective_id'=>  '3'               
             ],
            [
                'name'=>'Business Relationship, training and awareness.',
                'description'=>'Foster Employee growth and empower employee development.',
                'perspective_id'=> '4',             
            ],

            //! QMS STRATEGIC OBJECTIVES. 

            [
                'name'=>'Effective monitoring of QMS ISO9001:2015  program implementation',
                'perspective_id'=> '5',
            ],
            [
                'name'=>'Achieve effective Controls on the Key internal processes',
                'perspective_id'=> '5',
            ],
            [
                'name'=>'Improve employee awareness on QMS and compitencies',
                'perspective_id'=> '6',
            ],
            [
                'name'=>'QMS competencies ',
                'perspective_id'=> '6',
            ],
            [
                'name'=>'EBU NPS Details - To offer the highest possible standard of Products  to our customers',
                'perspective_id'=> '7',
            ],
            [
                'name'=>'Consumer NPS Details - To offer the highest possible standard of service to our customers',
                'perspective_id'=> '7',
            ],
            [
                'name'=>'Customer Quality Management in terms of que Management, Repeat caller and  Call Centre accessibility',
                'perspective_id'=> '7',
            ],
            [
                'name'=>'Improve Employee awareness on qms and compliance',
                'perspective_id'=> '8',
            ],
            [
                'name'=>'QMS compitencies across broad(SPOCs)',
                'perspective_id'=> '8',
            ],

            //! ISMS STRATEGIC OBJECTIVES. 

            [
                'name'=>'Decrease financial and Information loss',
                'perspective_id'=> '9',
            ],
            [
                'name'=>'Ensure regulatory and contractual IS compliance',
                'perspective_id'=> '9',
            ],
            [
                'name'=>'Provide secure and uninterrupted services to customers',
                'perspective_id'=> '10',
            ],
            [
                'name'=>'Protect the privacy of customer information',
                'perspective_id'=> '10',
            ],
            [
                'name'=>'Ensure systems and infrastructure security',
                'perspective_id'=> '11',
            ],
            [
                'name'=>'Manage ISMS efficiently',
                'perspective_id'=> '11',
            ],
            [
                'name'=>'Achieve effective system monitoring and audit',
                'perspective_id'=> '11',
            ],
            [
                'name'=>'Achieve effective access management',
                'perspective_id'=> '11',
            ],
            [
                'name'=>'Increase employee awareness and compliance',
                'perspective_id'=>'12',
            ],
            [
                'name'=>'Increase technical compitencies of the Information risk team',
                'perspective_id'=>'12',
            ]
        ];

        foreach ($specific_objectives as $key => $value) {
            StrategicObjective::create($value);
        }
    }
}