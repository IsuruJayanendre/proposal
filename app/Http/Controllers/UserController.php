<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\User;
use App\models\Post;

class UserController extends Controller
{
    public function view()
    {
        $users= User::all();
        return view('admin.users', compact('users'));
    }

    public function profile()
    {
        $users= User::all();
        $posts=Post::all();
        return view('user.profile', compact('users','posts'));
    }
}
