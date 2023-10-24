<?php

namespace App\Http\Controllers\admin\student;

use Storage;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Post;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    // students list
    public function studentsList()
    {
        $grades = Grade::orderBy('grade')->get();
        $students = Student::when(request('key'), function ($searchQuery) {
            $searchQuery->where('admission_id', 'like', '%' . request('key') . '%');
        })
            ->when(request('studentName'), function ($name) {
                $name->where('student_name', 'like', '%' . request('studentName') . '%');
            })
            ->when(request('phone'), function ($phone) {
                $phone->where('parent_code', 'like', '%' . request('phone') . '%');
            })
            ->when(request('grade') || request('grade') == '0', function ($g) {
                $g->where('grade', request('grade'));
            })
            ->paginate(10);
        return view('admin.student.students-list', compact('students', 'grades'));
    }

    //add student
    public function addStudentPage()
    {
        $grades = Grade::orderBy('grade')->get();
        return view('admin.student.add-student', compact('grades'));
    }

    public function addStudent(Request $request)
    {

        // // dd($request->toArray());
        $this->addstudentValidationCheck($request);
        $student = $this->requestStudentData($request);
        if ($request->hasFile('image')) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $imageName);
            $student['image'] = $imageName;
        }
        $student['new_status_expiry'] = Carbon::now()->addYear();
        Student::create($student);
        toastr()->success('A student has been registered admin!');
        return redirect()->route('admin#studentslist');
    }

    // edit student
    public function editStudent($id)
    {
        $grades = Grade::orderBy('grade')->get();
        $student = Student::where('id', $id)->first();
        return view('admin.student.edit-student', compact('student', 'grades'));
    }
    public function updateStudent(Request $request)
    {
        $this->addstudentValidationCheck($request);
        $edittedStudentData = $this->requestStudentData($request);

        if ($request->hasFile('image')) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $imageName);
            $edittedStudentData['image'] = $imageName;
        }
        Student::where('id', $request->id)->update($edittedStudentData);
        toastr()->info('A student data has been updated admin!');
        return redirect()->route('admin#studentslist');
    }

    // delete students
    public function deleteStudent($id)
    {
        Student::where('id', $id)->delete();
        toastr('A student has been removed');
        return redirect()->route('admin#studentslist');
    }

    //student details
    public function studentDetails($id)
    {
        $student = Student::where('id', $id)->first();
        $comments = Post::where('student_id', $id)->get();
        $reportMarks = Subject::where('student_id', $id)
            ->orderByRaw('DATE(exam_date)')
            ->orderBy('grade')
            ->get();
        // ->groupBy('grade');


        return view('admin.student.studentdetails', compact('student', 'comments', 'reportMarks'));
    }


    public function teacher()
    {
        return view('admin.teachers.index');
    }
    private function addstudentValidationCheck($request)
    {
        $validationRule = [
            'studentName' => 'required',
            'birthday' => 'required',
            'parentCode' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'fatherNrc' => 'required',
            'motherNrc' => 'required',
            'grade' => 'required',
            'admissionId' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'image' => 'mimes:jpg,png,webp'
        ];
        Validator::make($request->all(), $validationRule)->validate();
    }

    private function requestStudentData($request)
    {
        return [
            'student_name' => $request->studentName,
            'birthday' => $request->birthday,
            'parent_code' => $request->parentCode,
            'father_name' => $request->fatherName,
            'mother_name' => $request->motherName,
            'father_nrc' => $request->fatherNrc,
            'mother_nrc' => $request->motherNrc,
            'grade' => $request->grade,
            'admission_id' => $request->admissionId,
            'address' => $request->address,
            'siblings' => $request->broSis,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ];
    }
}
