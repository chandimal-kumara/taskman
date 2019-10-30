<?php

use Illuminate\Database\Seeder;
use App\TaskTypes;

class TaskTypesTableSeeder extends Seeder
{
    public function run()
    {
        $type = [
            [
                'code'      =>  'WEB',
                'name'      =>  'Web Development',
            ],

            [
                'code'      =>  'SFT',
                'name'      =>  'Software Development',
            ],

            [
                'code'      =>  'NET',
                'name'      =>  'Network Administration',
            ],

            [
                'code'      =>  'HRD',
                'name'      =>  'Computer Hardware',
            ],

            [
                'code'      =>  'SEQ',
                'name'      =>  'Internet Security',
            ],

            [
                'code'      =>  'DPL',
                'name'      =>  'Softwear Deployment',
            ],

            [
                'code'      =>  'CLD',
                'name'      =>  'Cloud Computing',
            ],

            [
                'code'      =>  'HST',
                'name'      =>  'Web Hosting',
            ],
        ];
            
        TaskTypes::insert($type);
    }
}
