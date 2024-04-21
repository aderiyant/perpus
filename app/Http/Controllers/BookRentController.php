<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Commit;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Buku;
use App\Models\RentLogs;
use DB;

class BookRentController extends Controller
{
    public function index()
    {
        $bukus = Buku::all(); // Mengambil semua data buku
        $users = Auth::user(); // Mengambil semua data user
        //dd($bukus);
        return view('siswa.peminjaman', compact('bukus', 'users'));
    }

    public function store(Request $request)
    {
         $request->validate([
           'kodebuku' => 'required', // Anda bisa menambahkan aturan validasi sesuai kebutuhan
        ]);

         // Menetapkan tanggal sewa dan tanggal pengembalian
         $rent_date = Carbon::now()->toDateString();
         $return_date = Carbon::now()->addDay(3)->toDateString();

         $userId = Auth::id();
         try {
             DB::beginTransaction(); // Memulai transaksi database

             // Memeriksa apakah buku tersedia
             $buku = Buku::findOrFail($request->kodebuku);
             if ($buku->status != 'tersedia') {
                 throw new \Exception('Buku tidak tersedia untuk dipinjam');
             }

    //         // Membuat entri peminjaman baru dalam RentLogs
             $rentLogs = new RentLogs();
             $rentLogs->kodebuku = $request->kodebuku;
             $rentLogs->rent_date = $rent_date;
             $rentLogs->return_date = $return_date;
             $rentLogs->user_id = $userId;
             $rentLogs->save();
            

    //         // Mengubah status buku menjadi tidak tersedia (dipinjam)
             $buku->status = 'tidak tersedia';
             $buku->save();
                //dd($buku);
              DB::commit(); // Commit transaksi

        //      // Redirect dengan pesan sukses
              Session::flash('message', 'Buku berhasil dipinjam');
              Session::flash('alert-class', 'alert-success');
              return redirect('/buku');
          } catch (\Throwable $th) {
              DB::rollback(); // Rollback transaksi jika terjadi error
              Session::flash('message', $th->getMessage());
              Session::flash('alert-class', 'alert-danger');
              return redirect('/buku');
          }
     }


    public function pengembalian()
    {
        $users = User::where('id', '!=', 1)->get();
        $bukus = Buku::all();
        return view('petugas.pengembalian', ['users' => $users, 'bukus' => $bukus]);
    }

public function simpanpengembalian(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'kodebuku' => 'required',
    ]);

    // Mengambil data peminjaman yang belum dikembalikan
    $rentData = RentLogs::where('user_id', $request->user_id)
                        ->where('kodebuku', $request->kodebuku)
                        ->whereNull('actual_return_date')
                        ->first();

    if($rentData) {
        // Menyimpan tanggal pengembalian aktual
        $rentData->actual_return_date = Carbon::now()->toDateString();
        $rentData->save();

        // Mengubah status buku menjadi tersedia
        $buku = Buku::where('kodebuku', $request->kodebuku)->first();
        $buku->status = 'tersedia';
        $buku->save();

        // Redirect dengan pesan sukses
        Session::flash('message', 'Pengembalian berhasil');
        Session::flash('alert-class', 'alert-success');
        return redirect('pengembalian');
    }
    else {
        // Redirect dengan pesan kesalahan jika tidak ada data peminjaman yang sesuai
        Session::flash('message', 'Tidak ada data pengembalian');
        Session::flash('alert-class', 'alert-danger');
        return redirect('pengembalian');
    }
}
}