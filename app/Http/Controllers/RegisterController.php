<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
           'name' => 'required|min:10',
           'username' => 'required|unique:users,username',
           'email' => 'required|email|unique:users,email',
           'password' => 'required'
        ]);
//        var_dump($attributes);
        $user = User::create($attributes);

        session()->flash('success', 'Your account has been created.');

        auth()->login($user);

        return redirect("/");
    }
}

