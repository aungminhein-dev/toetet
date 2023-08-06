<?php

namespace App\Http\Controllers\parent;

use App\Models\Student;
use App\Models\PublicPost;
use App\Models\Subject;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserParentController extends Controller
{
    public function home()
    {
        $students = Student::where('parent_code',Auth::user()->parent_code)->get();
        $posts = PublicPost::where('viewer_type','!=','admin')->get();
        return view('parent.parent',compact('students'));
    }

    public function showStudent()
    {
        $students = Student::where('parent_code',Auth::user()->parent_code)->get();
        return view('parent.about-student',compact('students'));
    }

    public function showPosts()
    {
        $posts = PublicPost::where('viewer_type','!=','admin')
        ->orwhere('post_type','posts')
        ->get();
        return view('parent.parent',compact('posts'));
    }

    public function showStudentDetails(Request $request)
    {
        $student = Student::where('id',$request->studentId)
        ->first();
        $reportMarks = Subject::where('student_id',$request->studentId)->get();
        $comments = Post::where('student_id',$request->studentId)->get();
       return view('parent.student-details',compact('student','reportMarks','comments'));
    }
}
