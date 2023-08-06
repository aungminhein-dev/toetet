<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'myanmar',
        'english',
        'maths',
        'physics',
        'chemistry',
        'science',
        'geography',
        'history',
        'biology',
        'social',
        'given_marks',
        'grade',
        'exam_date',
        'economy'
    ];

   
}
