<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\RentLogs;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('siswa.data_siswa', compact('data'));
    }
    public function tambah_siswa()
    {
        return view('siswa.tambah_siswa');
    }
    public function insert_siswa(Request $request)
    {
        User::create($request->all());
        return redirect()->route('siswa')->with('siswa berhasil di tambahkan');
    }
    public function tampilkan_siswa($id)
    {
        $data = User::find($id);
        $rentlogs = RentLogs::with(['user', 'buku'])->where('user_id', $data->id)->get();
        return view('siswa.tampilkan_siswa', ['data' => $data, 'rent_logs' => $rentlogs]);
    }

    public function update_siswa(Request $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());

        return redirect()->route('siswa')->with('siswa berhasil di update');
    }

    public function delete_siswa($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('siswa')->with('siswa berhasil di update');
    }

    //pencarian
    public function searchSiswa(Request $request)
    {
        $search = $request->get('search');
        $kelas = $request->get('kelas');

        $query = User::query();

        if (!empty($search)) {
            $query->where('namalengkap', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%");
        }

        if (!empty($kelas)) {
            $query->where('kelas', $kelas);
        }

        $data = $query->get();

        return view('siswa.data_siswa', compact('data'));
    }
}
