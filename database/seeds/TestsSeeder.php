<?php

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::truncate();

        $test=Test::create([
            'name'=>'Complete Blood Count',
            'shortcut'=>'CBC',
            'price'=>'30',
            'sample_type'=>'blood',
            'parent_id'=>0
        ]);

        Test::insert([
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'hgb-hemoglobin',
                'unit'=>'g/dl',
                'reference_range'=>'',
                'separated'=>true
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'hct-hematocrit',
                'unit'=>'%',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'RBC-Erythrocytes',
                'unit'=>'million/µl',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'MCV',
                'unit'=>'fl',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'MCH',
                'unit'=>'pg',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'MCHC',
                'unit'=>'g/dl',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'RDW-CV',
                'unit'=>'%',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'pit-platelet',
                'unit'=>'10^3/µ',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'MPV',
                'unit'=>'fl',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'PCT-PLATELETCRIT',
                'unit'=>'%',
                'reference_range'=>'',
                'separated'=>false
            ],
            [
                'parent_id'=>$test['id'],
                'type'=>'text',
                'title'=>false,
                'sample_type'=>$test['sample_type'],
                'name'=>'PDW',
                'unit'=>'%',
                'reference_range'=>'',
                'separated'=>false
            ],

        ]);
    }
}
