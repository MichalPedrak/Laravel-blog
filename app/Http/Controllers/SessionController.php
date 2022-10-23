<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye');
    }

    public function store(){
        // validate data
        // attempt to authenticate and log in the user based on provided data

        $attr = request()->validate(
            [
                'email' => 'required|email',   // jesli istenieje w bazie danych
                'password' => 'required'
            ]
        );


        if(auth()->attempt($attr)){
            session()->regenerate(); // tworzy nam token dla session fixation
            return redirect("/")->with('success', 'welcome back');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'email is wrong']); //$erros
    }

    public function create(){
        return view("session.create");
    }
}
