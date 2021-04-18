<?php

use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert(
            [
                ['teacher_name'  => 'Max', 'created_at'=>now(), 'updated_at'=>now()],
                ['teacher_name'  => 'Katie', 'created_at'=>now(), 'updated_at'=>now()]
            ]
        );
    }
}
