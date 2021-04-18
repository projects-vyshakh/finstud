<?php

use Illuminate\Database\Seeder;

class MarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('marks')->insert(
            [
                ['student_id'=>1, 'term'=>'one', 'maths'=>40, 'science'=>50, 'history'=>30, 'total'=>120, 'created_at'=>now(), 'updated_at'=>now()],
                ['student_id'=>2, 'term'=>'two', 'maths'=>40, 'science'=>50, 'history'=>30, 'total'=>120, 'created_at'=>now(), 'updated_at'=>now()],
            ]
        );
    }
}
