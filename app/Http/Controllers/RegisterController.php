<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'roles'=>$request->roles,
            $request->except(['_token']),
        ]);
        return redirect ('/login');
    }
}
