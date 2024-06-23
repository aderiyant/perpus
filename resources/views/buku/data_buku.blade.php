@extends('layouts.dasboard')

@section('container')

<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h1>Data Buku</h1>

        <!-- Form Filter Kategori -->
        <form action="{{ route('cari_buku') }}" method="GET" style="margin-top: 20px;">
            <div class="input-group mb-3">
                <select class="form-control" name="kategori">
                    <option value="">Semua kategori</option>
                    <option value="akademik">Akademik</option>
                    <option value="non akademik">Non-Akademik</option>
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
            @if (auth()->user()->level == "admin")
            <a href="/tambah_buku" class="btn btn-success">Tambah Buku</a>
            @endif
        </form>

        <!-- Form Pencarian -->
        <form action="{{ route('cari_buku') }}" method="GET" class="form-inline mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari buku...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabelbuku">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Rak Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                        @if (auth()->user()->level == "admin")
                        <th scope="col">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->kodebuku }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->rak }}</td>
                        <td>{{ $row->pengarang }}</td>
                        <td>{{ $row->kategori }}</td>
                        <td>{{ $row->status }}</td>
                        <td>
                            @if (auth()->user()->level == "admin")
                            <a href="/tampilkan_buku/{{ $row->id }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="/delete_buku/{{ $row->id }}" class="btn btn-danger btn-sm">Hapus</a>
                            @endif
                            @if (auth()->user()->level == "user" && $row->status == 'tersedia')
                            <form action="/book-rent" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="kodebuku" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Pinjam</button>
                            </form>
                            @endif
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

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelbuku').DataTable({
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "info": false,
            "responsive": true
        });
    });
</script>
@endsection
