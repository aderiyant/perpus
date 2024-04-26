<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{

    public function postlogin(Request $request)
    {
        $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
        ]);
       if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('buku')->withSuccess('You have successfully logged in!');
        }
    }
}