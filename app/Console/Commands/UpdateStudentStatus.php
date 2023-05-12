<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Student;
class UpdateStudentStatus extends Command
{

    protected $signature = 'update:student-status';


    protected $description = 'Update status description';

    public function handle()
    {
        $now = Carbon::now();

        $newStudents = Student::where('status','new')
        ->where('new_status_expiry','<=',$now)
        ->get();

        foreach($newStudents as $newstudent){

            $newstudent->status = 'old';
            $newstudent->save();
        }
    }
}
