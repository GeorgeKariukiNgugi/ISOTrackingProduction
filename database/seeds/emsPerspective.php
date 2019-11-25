<?php
use App\Perspective;
use Illuminate\Database\Seeder;

class emsPerspective extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emsPerspectives = [
            [
                'name'=>'Environmental Management System Perspective.',
                'weight'=>'100',
                'program_id'=>'4',
            ]
        ];

        foreach ($emsPerspectives as $key => $value) {
            Perspective::create($value);
        }
    }
}
