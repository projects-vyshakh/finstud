<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //$this->call(StudentsSeeder::class);
        //$this->call(TeachersSeeder::class);
        $this->call(MarksSeeder::class);
    }
}
