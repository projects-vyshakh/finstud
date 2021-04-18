<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('students')->insert([
            ['name'=>'John Doe', 'age'=>18, 'gender'=>'M', 'created_at'=>now(), 'updated_at'=>now()],
            ['name'=>'Mary', 'age'=>22, 'gender'=>'F', 'created_at'=>now(), 'updated_at'=>now()]
        ]);
    }
}
