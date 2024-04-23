@extends('layouts.dasboard')

@section('container')

<body>
    <div class="container">
        <div class="col-md-10" >
            <h1  style="left: 320px; top: 100px; position: absolute;">Data Siswa</h1>
<table class="table" id="tabelsiswa" style="left: 300px; top: 180px; position: absolute; width:40%"  >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">NIS / NIK </th>
            <th scope="col">jeniskelamin</th>
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
        <a href="/tambah_siswa" class="btn btn-success">Input</a>
        <a href="/tampilkan_siswa/{{ $row->id }}" class="btn btn-info">edit</a>
        <a href="/delete_siswa/{{ $row->id }}" class="btn btn-danger">Hapus</a>
    </td>
</tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div>
    
</body>
@endsection