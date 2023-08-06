<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;


class ExamController extends Controller
{
    public function storeResultPage($id)
    {
        $student = Student::where('id',$id)->select('id','grade','student_name')->first();
        return view('admin.student.add-exam-result',compact('student'));
    }

    public function storeExamResult(Request $request)
    {
        $data = $this->getMarks($request);
        Subject::create($data);
        return redirect('/admin/student/details/'.$request->studentId);
    }

    public function deleteExamResult($id)
    {
        Subject::where('id',$id)->delete();
        toastr('Results for a month have deleted!');
        return back();
    }

    // edit exam results
    public function editExamResult($id)
    {
        $results = Subject::where('id',$id)->first();
        $student = Student::where('id',$results->student_id)->select('student_name','id')->first();
        return view('admin.student.edit-exam-result',compact('results','student'));
    }

    //update exam result
    public function updateExamResult(Request $request)
    {
        $data = $this->getMarks($request);
        Subject::where('id',$request->examId)->update($data);
        toastr('Results have been updated!');
        return redirect('/admin/student/details/'.$request->studentId);
    }

    private function getMarks($request)
    {
        return [
           'student_id'=>$request->studentId,
            'myanmar'=>$request->myanmar,
            'english'=>$request->english,
            'maths'=>$request->maths,
            'physics'=>$request->physics,
            'chemistry'=>$request->chemistry,
            'science'=>$request->science,
            'geography'=>$request->geography,
            'history'=>$request->history,
            'biology'=>$request->biology,
            'economy'=>$request->economy,
            'social'=>$request->social,
            'grade'=>$request->grade,
            'given_marks'=>$request->givenMarks,
            'exam_date'=>$request->examDate
        ];
    }

}
