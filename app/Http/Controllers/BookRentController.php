<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Buku;
use App\Models\RentLogs;
use Illuminate\Support\Facades\DB;

class BookRentController extends Controller
{
    public function index()
    {
        $bukus = Buku::all(); // Mengambil semua data buku
        $users = Auth::user();
        return view('siswa.peminjaman', compact('bukus', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodebuku' => 'required',
        ]);

        $rent_date = Carbon::now()->toDateString();
        $return_date = Carbon::now()->addDays(3)->toDateString();

        $userId = Auth::id();
        try {
            DB::beginTransaction();

            $buku = Buku::findOrFail($request->kodebuku);
            if ($buku->status != 'tersedia') {
                throw new \Exception('Buku tidak tersedia untuk dipinjam');
            }

            $rentLogs = new RentLogs();
            $rentLogs->kodebuku = $request->kodebuku;
            $rentLogs->rent_date = $rent_date;
            $rentLogs->return_date = $return_date;
            $rentLogs->user_id = $userId;
            $rentLogs->save();

            $buku->status = 'tidak tersedia';
            $buku->save();

            DB::commit();

            Session::flash('message', 'Buku berhasil dipinjam');
            Session::flash('alert-class', 'alert-success');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function pengembalian()
    {
        $users = User::where('id', '!=', 1)->get();
        $bukus = Buku::all();
        return view('petugas.pengembalian', compact('users', 'bukus'));
    }

    public function simpanpengembalian(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)
            ->where('kodebuku', $request->kodebuku)
            ->whereNull('actual_return_date');

        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            // Mengubah status buku menjadi tersedia setelah dikembalikan
            $buku = Buku::findOrFail($request->kodebuku);
            $buku->status = 'tersedia';
            $buku->save();

            Session::flash('message', 'Pengembalian Berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('pengembalian');
        } else {
            Session::flash('message', 'Tidak ada data pengembalian');
            Session::flash('alert-class', 'alert-danger');
            return redirect('pengembalian');
        }
    }
}
