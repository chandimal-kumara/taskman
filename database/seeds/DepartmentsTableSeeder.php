<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        $department = [
            [
                'dep_id'        =>  'HR',
                'name'          =>  'Human Resources Department',
            ],

            [
                'dep_id'        =>  'ACC',
                'name'          =>  'Accounting Department',
            ],

            [
                'dep_id'        =>  'IT',
                'name'          =>  'Information Technology Department',
            ],            
        ];
            
        Department::insert($department);
    }
}
