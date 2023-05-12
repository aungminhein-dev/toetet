<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ParentController extends Controller
{
    public function students()
    {
        $students = Student::latest('grade')->get();
        return response()->json([
            'student'=>$students
        ]);
    }
}
