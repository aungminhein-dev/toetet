<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\PublicPost;


class GuestController extends Controller
{
    public function guestPage()
    {
        $grades = Grade::select('grade')->get();
        $posts = PublicPost::where('viewer_type','public')
        ->where('post_type','normal')
        ->orderBy('view_count')
        ->get()->take(6);
        $studentCount = Student::count();
        return view('welcome',compact('grades','posts','studentCount'));
    }

    //show post
    public function showPosts()
    {
        $posts = PublicPost::where('viewer_type','public')
        ->where('post_type','normal')
        ->orderBy('created_at')
        ->get();
        return view('posts',compact('posts'));
    }

    //post details
    public function postDetails($id)
    {
        $post = PublicPost::where('viewer_type','public')
        ->where('post_type','normal')
        ->where('id',$id)
        ->first();
        return view('post-details',compact('post'));
    }

    //add view count
    public function increaseViewCount(Request $request)
    {
        PublicPost::where('id',$request->postId)->increment('view_count',1);
    }

    public function loginPage()
    {
        return view('Login');
    }

    public function registerPage()
    {
        return view('Register');
    }
}
