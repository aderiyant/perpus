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
        return view('petugas.data_peminjaman',['rent_logs' => $rentlogs]);

    }
    public function delete($id){
        $rentlogs = RentLogs::find($id);
        $rentlogs->delete();
        return redirect()->route('petugas.data_peminjaman')->with('success','data berhasil dihapus');
    }
}
