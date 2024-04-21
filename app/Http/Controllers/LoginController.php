<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password')))
        {
            return redirect('buku');
        }
        return redirect('/');
        //dd($request->all());
    }
}