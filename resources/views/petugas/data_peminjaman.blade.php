@extends('layouts.dasboard')

@section('container')

<div class="card">
    <div class="card-body">
        @if (session('alert'))
        <div class="alert alert{{ session('alert-class') }}">
            {{ session('alert') }}
        </div>
        @endif
        <h1>Data Peminjaman Buku</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tabelSiswa">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Rent Date</th>
                        <th>Return Date</th>
                        <th>Actual Return Date</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rent_logs as $row)
                    <tr class="{{ $row->actual_return_date == null ? '' : ($row->return_date
                        < $row->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->user->namalengkap}}</td>
                        <td>{{ $row->buku ? $row->buku->judul : 'Buku tidak ditemukan' }}</td>
                        <td>{{ $row->rent_date }}</td>
                        <td>{{ $row->return_date }}</td>
                        <td>{{ $row->actual_return_date }}</td>
                        <td>
                            <form action="{{ route('hapus-peminjaman', ['id' => $row->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelSiswa').DataTable({
            "pageLength": 10,
            "lengthChange": false,
            "searching": true,
            "info": true,
            "responsive": true,
            "order": []
        });
    });
</script>
@endsection
