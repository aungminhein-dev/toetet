<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'09797957976',
            'address'=>'Mandalay',
            'role'=>'admin',
            'nrc'=>'၁၂/ဒဂဆ(နိုင်)၁၅၀၂၈၄',
            'gender'=>'male',
            'password'=>Hash::make('admin123')
        ]);

        User::create([
            'username'=>'U Win',
            'email'=>'uwin@gmail.com',
            'phone'=>'09794023074',
            'address'=>'Mandalay',
            'role'=>'parent',
            'nrc'=>'၅/စကန(နိုင်)၁၅၀၂၈၄',
            'gender'=>'male',
            'parent_code'=> 150284,
            'password'=>Hash::make('admin123')
        ]);

        Grade::create([
            'grade'=>1
        ]);
        Student::create([
            'student_name'=>'Aung Aung',
            'birthday'=>'07.08.2005',
            'admission_id'=>345670,
            'father_name'=> 'U Win',
            'father_nrc'=>'၅/စကန(နိုင်)၁၅၀၂၈၄',
            'mother_name'=>'Daw Su Su Lwin',
            'mother_nrc'=> '၁၂/ကတန(နိုင်)၂၂၃၃၄၄၅',
            'grade'=>11,
            'address'=>'Yangon/Dagon Seikkan',
            'parent_code'=>150284,
            'phone'=>'09794023074',
            'gender' => 'male',
        ]);
    }
}
