<?php

namespace App\Http\Controllers\admin\parent;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    // parent list page
    public function parentsList()
    {
        $parentWithStudentCode = DB::table('users')
        ->join('students', 'users.parent_code', 'students.parent_code')
        ->count();
        $parents = User::where('role','parent')
        ->leftJoin('students', 'users.parent_code', 'students.parent_code')
        ->select('users.*','students.parent_code as s_parentCode')
        ->when(request('name'),function($searchQuery){
            $searchQuery->where('users.username','like','%'.request('name').'%');
        })
        ->when(request('nrc'),function($name){
            $name->where('users.nrc','like','%'.request('nrc').'%');
        })
        ->when(request('parentCode'),function($parentCode){
            $parentCode->where('users.parent_code','like','%'.request('parentCode').'%');
        })
        ->when(request('status') || request('status') == 0,function($status){
            $status->where('users.status','like','%'.request('status').'%');
        })
        ->paginate(10);
        // dd($parents->toArray());
        return view('admin.parent.parents-list',compact('parents','parentWithStudentCode'));
    }

      // parents without student
    public function parentsWithoutStudent()
    {
        $parentWithoutStudentCode = DB::table('users')
        ->select('users.*','students.parent_code as s_parentCode')
        ->leftJoin('students', 'users.parent_code', 'students.parent_code')
        ->where('users.role','parent')
        ->whereNull('students.parent_code')
        ->paginate(10);
        return view('admin.parent.nostudentparent',compact('parentWithoutStudentCode'));
    }

      // add parent page
    public function addParentPage()
    {
        return view('admin.parent.add-parent');
    }

      // active status
    public function activeStatus($id,$role)
    {
        $parent = User::where('role',$role)->find($id);
        return response()->json(['status' => $parent->status]);
    }

      // add parent
    public function addParent(Request $request)
    {
        $this->addParentValidation($request,'create');
        $data = $this->getParentData($request,'create');
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }
        User::create($data);
        toastr('A parent has been added');
        return redirect()->route('admin#parentsList');
    }

      // parent deatails
    public function parentDetails($id)
    {
        $parent = User::select('users.*','students.parent_code as s_parentCode')
        ->leftJoin('students', 'users.parent_code', 'students.parent_code')
        ->where('users.id',$id)->first();
        $students = Student::where('parent_code',$parent->parent_code)->orderBy('grade')->get();
        return view('admin.parent.parent-details',compact('parent','students'));
    }

      // edit parent data
    public function editParent($id)
    {
        $parent = User::where('id',$id)->first();
        return view('admin.parent.edit-parent',compact('parent'));
    }

    //   delete parent
    public function deleteParent($id)
    {
        User::where('id',$id)->delete();
        toastr('A parent has been removed');
        return redirect()->route('admin#parentsList');
    }

    // update parent data
    public function updateParent(Request $request)
    {
        $this->addParentValidation($request,'update');
        $data = $this->getParentData($request,'update');
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }
        User::where('id',$request->id)->update($data);
        toastr()->info('A parent detail has been updated');
        return back();
    }

    private function getParentData($request,$action)
    {
        return [
            'username'=>$request->username,
            'email'=>$request->email,
            'parent_code'=>$request->parentCode,
            'nrc'=>$request->nrc,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'password'=>Hash::make($request->password),
            'address'=>$request->address,
            'role'=>'parent'
        ];
    }

    private function addParentValidation($request,$action)
    {
        $validationRule = [
            'username'=> 'required',
            'email'=>'required',
            'parentCode'=>'required',
            'nrc'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'image'=>'mimes:jpg,png,webp'
        ];
        $validationRule['password'] = $action == 'create' ? 'required' : '';

        Validator::make($request->all(),$validationRule)->validate();
    }
}
