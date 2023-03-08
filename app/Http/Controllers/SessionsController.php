<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attibutes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attibutes)) {
            throw ValidationException::withMessages([
                'email' => 'As crendenciais fonecidas não podem ser verificadas'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('sucess', 'Seja bem vinda(o)');

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('sucess', 'Tchauzinho!');
    }
}
