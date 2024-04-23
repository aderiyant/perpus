<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Buku;
use \App\Models\User;

class BukuController extends Controller
{
  public function index()
  {
    $data = Buku::all();

    return view('buku.data_buku', compact('data'));
  }
  public function tambah_buku()
  {
    return view('buku.tambah_buku');
  }
  public function insert_buku(Request $request)
  {
    Buku::create($request->all());
    return redirect()->route('buku')->with('buku berhasil di tambahkan');
  }
  public function tampilkan_buku($id)
  {
    $data = Buku::find($id);

    return view('buku.tampilkan_buku', compact('data'));
  }
  public function update_buku(Request $request, $id)
  {
    $data = Buku::find($id);
    $data->update($request->all());

    return redirect()->route('buku')->with('buku berhasil di update');
  }

  public function delete_buku($id)
  {
    $data = Buku::find($id);
    $data->delete();

    return redirect()->route('buku')->with('buku berhasil di update');
  }
  //  pencarian
  public function cariBuku(Request $request)
  {
    $search = $request->input('search');

    $data = Buku::where('judul', 'like', "%{$search}%")
      ->orWhere('pengarang', 'like', "%{$search}%")
      ->orWhere('kategori', 'like', "%{$search}%")
      ->get();

    return view('buku.data_buku', compact('data'));
  }
}
