<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use App\Models\PublicPost;

class DashboardController extends Controller
{
    // dashboard
    public function adminDashboard()
    {
        $postCount = PublicPost::count();
        $studentCount = Student::count();
        $parentCount = User::where('role','parent')->count();
        $adminCount = User::where('role','admin')->count();
        $students = Student::select('grade')
        ->orderBy('grade')
        ->groupBy('grade')
        ->select('grade',DB::raw('count(*) as total'))
        ->get();
        // Students with grade chart
        // grade array
        $chartGrade = [];
        $studentArray = [];
        foreach($students as $s){
            $chartGrade[] = "Grade ".$s->grade;
            $studentArray[] = $s->total;
        }

        $horizontal = [];
        $vertical = [];
        $student = Student::select(
            DB::raw("COUNT(*) as total"),
            DB::raw( "MONTHNAME(created_at) as monthName"),
            DB::raw('YEAR(created_at) as years')
        )
        ->groupBy('monthName','years')
        ->orderBy('years')
        ->orderByRaw("DATE_FORMAT(created_at, '%m') ASC")
        ->get();

        foreach($student as $s){
            $horizontal[] = $s->monthName.'/'.$s->years;
            $vertical[] = $s->total;
        }


        // recent added parent
        $latestParents = User::where('role','parent')
        ->leftJoin('students', 'users.parent_code', 'students.parent_code')
        ->select('users.id','users.username','users.created_at','users.parent_code','users.phone','users.address','students.parent_code as s_parentCode')
        ->latest('created_at')->take(5)->get();

        return view('admin.dashboard',compact('studentCount','parentCount','postCount','latestParents','horizontal','vertical','chartGrade','studentArray','adminCount'));
    }

    // charts on change
    public function dashboardStatitics(Request $request){
        $x_data = [];
        $y_data = [];
        if($request->key == 'month'){
            $student = Student::select(
                DB::raw("COUNT(*) as total"),
                DB::raw( "MONTHNAME(created_at) as monthName"),
                DB::raw('YEAR(created_at) as years')
            )
            ->groupBy('monthName','years')
            ->orderBy('years')
            ->orderByRaw("DATE_FORMAT(created_at, '%m') ASC")
            ->get();

            foreach($student as $s){
                $x_data[] = $s->monthName .'/' . $s->years;
                $y_data[] = $s->total;
            }
        }else{
            $student = Student::select(
                DB::raw("COUNT(*) as total"),
                DB::raw('YEAR(created_at) as years')
            )
            ->orderBy('years','asc')
            ->groupBy('years')
            ->get();

            foreach ($student as $s){
                $x_data[] = $s->years;
                $y_data[] = $s->total;
            }
        }

        return response()->json([
            'x_data'=>$x_data,
            'y_data'=>$y_data
        ]);
    }
}
