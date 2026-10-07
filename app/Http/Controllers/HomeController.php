<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $name = "Abd";
        $users = User::all();

        return view('home', compact('name', 'users'));
    }
}
