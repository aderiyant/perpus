@extends('layouts.dasboard')

@section('container')

<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1>Data Siswa</h1>

        <!-- Form Filter Kategori -->
        <form action="{{ route('cari_siswa') }}" method="GET" style="margin-top: 10px;">
            <div class="input-group mb-3">
                <select class="form-control" name="kategori">
                    <option value="">Semua Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
            @if (auth()->user()->level == "admin")
            <a href="/tambah_siswa" class="btn btn-success">Tambah Siswa</a>
            @endif
        </form>

        <!-- Form Pencarian -->
        <form action="{{ route('cari_siswa') }}" method="GET" class="form-inline mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari siswa...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabelsiswa">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NIS / NIK</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Password</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->namalengkap }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->jeniskelamin }}</td>
                        <td>{{ $row->password }}</td>
                        <td>{{ $row->kelas }}</td>
                        <td>{{ $row->level }}</td>
                        <td>
                            <a href="/tampilkan_siswa/{{ $row->id }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="/delete_siswa/{{ $row->id }}" class="btn btn-danger btn-sm delete-siswa">Hapus</a>
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
        $('#tabelsiswa').DataTable({
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "info": false,
            "responsive": true
        });

        // Mengatur alert setelah aksi berhasil
        @if(session('tambah'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('tambah') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if(session('edit'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('edit') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if(session('hapus'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('hapus') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>
@endsection
