<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
    }
}
