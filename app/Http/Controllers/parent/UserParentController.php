<?php

namespace App\Http\Controllers\parent;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserParentController extends Controller
{
    public function home()
    {
        return view('parent.parent');
    }
}
