<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name','birthday','admission_id','father_name','mother_name','mother_nrc','father_nrc','siblings','grade','address','parent_code','phone','image','gender','new_status_expiry'
    ];
}
