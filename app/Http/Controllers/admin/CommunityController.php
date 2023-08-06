<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class CommunityController extends Controller
{
        //comment
        public function comment(Request $request)
        {
            $comment = [
                'user_name'=>$request->userName,
                'comment' => $request->comment,
                'student_id'=>$request->studentId
            ];

            Post::create($comment);
            toastr('Your comment is posted!');
            return back();
        }
        // delete comment
        public function deleteComment($id)
        {
            Post::where('id',$id)->delete();
            toastr()->error('A comment has been deleted');
            return back();
        }
}
