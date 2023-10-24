<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name', 'birthday', 'admission_id', 'father_name', 'mother_name', 'mother_nrc', 'father_nrc', 'siblings', 'grade', 'address', 'parent_code', 'phone', 'image', 'gender', 'new_status_expiry'
    ];

    public function parent()
    {
        return $this->belongsTo(User::class,'students.parent_code','users.parent_code');
    }
}
