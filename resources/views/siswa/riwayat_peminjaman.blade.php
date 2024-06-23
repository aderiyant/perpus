@extends('layouts.dasboard')

@section('styles')
<style>
    .table tbody td {
        color: #000000; /* Warna hitam */
        font-weight: normal; /* Mengatur tebal normal */
    }
</style>
@endsection

@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Riwayat Peminjaman</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rent_logs as $riwayat)
                                    <tr class="{{ $riwayat->actual_return_date == null ? '' : ($riwayat->return_date
                                        < $riwayat->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $riwayat->buku->judul }}</td>
                                        <td>{{ $riwayat->rent_date }}</td>
                                        <td>{{ $riwayat->actual_return_date }}</td>
                                        <td>{{ $riwayat->actual_return_date ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
