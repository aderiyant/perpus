@extends('layouts.dasboard')

@section('container')
<div class="container">
    <h1>Riwayat Peminjaman</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rent_logs as $riwayat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $riwayat->buku->judul }}</td>
                <td>{{ $riwayat->rent_date }}</td>
                <td>{{ $riwayat->return_date }}</td>
                <td>{{ $riwayat->actual_return_date ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection