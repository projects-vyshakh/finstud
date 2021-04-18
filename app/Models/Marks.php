<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $fillable = [
        'student_id', 'term', 'maths', 'science', 'history', 'total', 'created_at', 'updated_at'
    ];
}
