<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(TaskTypesTableSeeder::class);
        $this->call(TaskCommentsTableSeeder::class);
    }
}
