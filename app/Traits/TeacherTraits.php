<?php

namespace App\Traits;


use App\Models\Teachers;
use App\Services;

trait TeacherTraits{


   public function getTeachers() {
        return Teachers::orderBy('teacher_name')->pluck('teacher_name', 'id')->toArray();
   }

}
