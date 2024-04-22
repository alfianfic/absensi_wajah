<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }
    public function test()
    {
        return view('user.test');
    }
    public function profil()
    {
        return view('user.profil');
    }
}
