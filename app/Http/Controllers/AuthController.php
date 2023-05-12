<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
     //dashboard
     public function dashboard(){
        if(Auth::check()){
            User::where('id',Auth::user()->id)->update(['status'=> 1]);
        }
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#dashboard');
        }else{
            return redirect()->route('parent#home');
        }

    }
}
