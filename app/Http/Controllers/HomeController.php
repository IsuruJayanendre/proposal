<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\User;

use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->usertype == 'user')
        {
            return view('user.home');
        }
        else
        {
            return view('admin.dashboard');
        }
    }
}
