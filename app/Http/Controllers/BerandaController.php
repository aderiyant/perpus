<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function dashboard()
    {
        return view('petugas.dash');

    }
    public function dash()
    {
        return view('siswa.dash');

    }
}
