@extends('layouts.dasboard')

@section('container')

<div class="container mt-4">
        <h1>Data Siswa</h1>
        <!-- Form pencarian -->
        <form action="{{ route('cari_siswa') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari..." required>
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <!--Filter Kelas -->
        <form action="{{ route('cari_siswa') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select class="form-control" name="kelas">
                    <option value="">Semua Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
            </div>
        </form>
        <!-- Tombol tambah siswa -->
        <a href="/tambah_siswa" class="btn btn-success mb-3">Tambah Siswa</a>
        <div class="table-responsive">
            <table class="table table-striped" id="tabelsiswa">
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
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->namalengkap }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->jeniskelamin }}</td>
                            <td>{{ $row->password }}</td>
                            <td>{{ $row->kelas }}</td>
                            <td>{{ $row->level }}</td>
                            <td>
                                <a href="/tampilkan_siswa/{{ $row->id }}" class="btn btn-info">Edit</a>
                                <a href="/delete_siswa/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection