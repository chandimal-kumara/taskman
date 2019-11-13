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
                'name'              =>  'admin',
                'email'             =>  'admin@erp.com',
                'type'              =>  'admin',
                'password'          =>  bcrypt('admin'),
                'status'            =>  'active',
            ],

            [
                'name'              =>  'user',
                'email'             =>  'user@erp.com',
                'type'              =>  'user',
                'password'          =>  bcrypt('user'),
                'status'            =>  'active',
            ],

            [
                'name'              =>  'manager',
                'email'             =>  'manager@erp.com',
                'type'              =>  'manager',
                'password'          =>  bcrypt('manager'),
                'status'            =>  'active',
            ],
        ];
            
        User::insert($users);
    }
}
