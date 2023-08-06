<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Category;
use App\Models\PublicPost;
use App\Models\User;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    // admin list
    public function adminList()
    {
        $admins = User::where('role','admin')
        ->when(request('key'),function($admin){
            $admin->where('username','like','%'.request('key').'%');
        })
        ->paginate(10);
        return view('admin.admin-list',compact('admins'));
    }

    public function addAdminPage()
    {

        return view('admin.add-admin');
    }
    // add admin
    public function addAdmin(Request $request)
    {
        $validationRule = [
            'username'=> 'required',
            'email'=>'required',
            'nrc'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'password' => 'required',
            'image'=>'mimes:jpg,png,webp'
        ];
        Validator::make($request->all(),$validationRule)->validate();
        $data = [
            'username' => $request->username,
            'role'=>'admin',
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
            'nrc'=>$request->nrc,
            'gender'=>$request->gender
        ];
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }
        User::create($data);
        toastr('An admin has been added to system');
        return redirect()->route('admin#list');
    }
    // add one grade to students
    public function addGrade(Request $request)
    {
        $user = User::where('username',$request->username)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $students = Student::all();
                foreach($students as $student){
                    $student->grade += 1;
                    $student->save();
                }
            }else{
                toastr()->error('Wrong password try again!');
                return back();
            }
        }
        toastr('Students have been upgraded to another grade');
        return redirect('/admin/student/students-list');
    }

      // add post page
      public function addPostPage()
      {
          $categories = Category::get();
          $grades = Grade::orderBy('grade','asc')->get();
          return view('admin.post.add-post',compact('grades','categories'));
      }

      public function deletePost($id)
      {
          PublicPost::where('id',$id)->delete();
          toastr('A post has been deleted.');
          return back();
      }

    // add post
    public function addPost(Request $request)
    {
        $data = [
           'title' =>$request->title,
           'author_name'=>$request->authorName,
           'grade' => $request->grade,
           'description'=>$request->description,
           'viewer_type'=>$request->viewerType,
            'post_type'=>$request->postType,


        ];

        if($request->hasFile('media')){
            $media = uniqid().$request->file('media')->getClientOriginalName();
            $request->file('media')->storeAs('public/posts',$media);
            $data['media'] = $media;
        }

        $validationRule = [
            'title'=>'required',
            'description'=>'required'
        ];
        Validator::make($request->all(),$validationRule)->validate();
        PublicPost::create($data);
        toastr('A post has been created.');
        return back();
    }

    // posts for public view and parent side
    public function showPosts()
    {
        $posts = PublicPost::when(request('key'),function($query){
            $query->where('title','like','%'.request('key').'%');
        })
        ->latest('created_at')
        ->get();
        return view('admin.post.posts',compact('posts'));
    }

    // post detail
    public function postDetail($id)
    {
        $post =PublicPost::where('id',$id)
        ->first();
        return view('admin.post.post-detail',compact('post'));
    }

    // post edit
    public function editPost($id)
    {
        $post = PublicPost::where('id',$id)->first();
        $grades = Grade::orderBy('grade','asc')->get();
        $categories = Category::get();
        return view('admin.post.edit-post',compact('post','grades','categories'));
    }

    public function updatePost(Request $request)
    {
        $data = [
            'title' =>$request->title,
            'author_name'=>$request->authorName,
            'grade' => $request->grade,
            'description'=>$request->description,
            'viewer_type'=>$request->viewerType,
            'post_type'=>$request->postType
        ];

         if($request->hasFile('media')){
             $media = uniqid().$request->file('media')->getClientOriginalName();
             $request->file('media')->storeAs('public/posts',$media);
             $data['media'] = $media;
         }

         $validationRule = [
            'title'=>'required',
            'description'=>'required'
         ];
         Validator::make($request->all(),$validationRule)->validate();
         PublicPost::where('id',$request->id)->update($data);
         toastr('A post has been updated.');
         return redirect()-> route('admin#posts');
    }



}
