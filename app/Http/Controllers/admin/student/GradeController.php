<?php

namespace App\Http\Controllers\admin\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    public function grade()
    {
        $grades = Grade::orderBy('grade','asc')->get();
        return view('admin.student.grade',compact('grades'));
    }

    // add grade
    public function addGrade(Request $request)
    {
        Validator::make($request->all(),[
            'grade'=>'required|unique:grades,grade'

        ])->validate();
        $grade = [
            'grade' => $request->grade
        ];
        Grade::create($grade);
        // toastr()->success('A grade has been added admin');
        toastr('A grade has been added admin.');
        return back();
    }

    public function removeGrade($id)
    {
        Grade::where('id',$id)->delete();
        toastr()->error('A grade has been removed admin');
        return back();
    }
}
