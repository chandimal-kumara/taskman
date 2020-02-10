<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $users = [
            [
                'user_id'           =>  'admin_a1',
                'name'              =>  'admin',
                'email'             =>  'kumara.8375@gmail.com',
                'type'              =>  'admin',
                'password'          =>  bcrypt('abc@1234'),
                'status'            =>  'active',
            ],

            /* [
                'user_id'           =>  'manager_m2',
                'name'              =>  'manager',
                'email'             =>  'manager@erp.com',
                'type'              =>  'manager',
                'password'          =>  bcrypt('manager'),
                'status'            =>  'active',
            ],

            [
                'user_id'           =>  'user_u3',
                'name'              =>  'user',
                'email'             =>  'user@erp.com',
                'type'              =>  'user',
                'password'          =>  bcrypt('user'),
                'status'            =>  'active',
            ],
            
            [
                'user_id'           =>  'chandimal_a4',
                'name'              =>  'chandimal',
                'email'             =>  'chandimal@erp.com',
                'type'              =>  'admin',
                'password'          =>  bcrypt('chandimal'),
                'status'            =>  'active',
            ],

            [
                'user_id'           =>  'tharanga_u5',
                'name'              =>  'tharanga',
                'email'             =>  'tharanga@erp.com',
                'type'              =>  'user',
                'password'          =>  bcrypt('tharanga'),
                'status'            =>  'active',
            ],

            [
                'user_id'           =>  'kalum_m6',
                'name'              =>  'kalum',
                'email'             =>  'kalum@erp.com',
                'type'              =>  'manager',
                'password'          =>  bcrypt('kalum'),
                'status'            =>  'active',
            ],

            [
                'user_id'           =>  'suneth_m7',
                'name'              =>  'suneth',
                'email'             =>  'suneth@erp.com',
                'type'              =>  'manager',
                'password'          =>  bcrypt('suneth'),
                'status'            =>  'active',
            ], */
        ];
            
        User::insert($users);
    }
}
