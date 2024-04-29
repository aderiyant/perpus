<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentLogsController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with(['user', 'buku'])->get();
        return view('petugas.data_peminjaman', ['rent_logs' => $rentlogs]);
    }

    public function hapus_peminjaman($id)
    {
        $rentLog = RentLogs::find($id);
        if ($rentLog) {
            $rentLog->delete();
            return redirect()->back()->with('message', 'Data peminjaman berhasil dihapus')->with('alert-class', 'alert-success');
        } else {
            return redirect()->back()->with('message', 'Data peminjaman tidak ditemukan')->with('alert-class', 'alert-danger');
        }
    }

    public function riwayat()
    {
        $riwayat_peminjaman = RentLogs::where('user_id', auth()->user()->id)->get();
        return view('siswa.riwyat_peminjaman', ['rent_logs' => $riwayat_peminjaman]);
    }
}
