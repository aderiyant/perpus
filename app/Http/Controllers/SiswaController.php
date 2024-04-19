<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Siswa;
use Auth;
class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();

        return view('siswa.data_siswa', compact('data'));

    }
    public function tambah_siswa()
    {
        return view('siswa.tambah_siswa');
    }
    public function insert_siswa(Request $request)
    {
        Siswa::create($request->all());
        return redirect()->route('siswa')->with('siswa berhasil di tambahkan');
    }
    public function tampilkan_siswa($id)
    {
        $data = Siswa::find($id);

        return view('siswa.tampilkan_siswa', compact('data'));
    }
    public function update_siswa(Request $request, $id)
    {
        $data = Siswa::find($id);
        $data->update($request->all());

        return redirect()->route('siswa')->with('siswa berhasil di update');
    }

    public function delete_siswa($id)
    {
        $data = Siswa::find($id);
        $data->delete();

        return redirect()->route('siswa')->with('siswa berhasil di update');
    }
}
