@extends('layouts.dasboard')

@section('container')
<body>
    <div class="container">
        <div class="col-md-10" >
            <div>
                    @if (session('message'))
                    <div class="alert alert{{ session('alert-class') }}">
                        {{ session('message') }}
                    </div>
                    @endif
            <h1  style="left: 320px; top: 100px; position: absolute;">Data Buku</h1>
<table class="table" id="tabelbuku" style= "left:320px; top: 180px; position: absolute; width:60%" class="col-12 col-md-8 offset-md-2" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">kodebuku</th>
            <th scope="col">judul</th>
            <th scope="col">pengarang</th>
            <th scope="col">kategori</th>
            <th scope="col">status</th>
            @if (auth()->user()->level=="admin")
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
    <th scope="row">{{ $no++ }}</th>
    <td>{{ $row->kodebuku }}</td>
    <td>{{ $row->judul }}</td>
    <td>{{ $row->pengarang }}</td>
    <td>{{ $row->kategori }}</td>
    <td>{{ $row->status }}</td>
    <td>
        @if (auth()->user()->level == "admin")
        <a href="/tambah_buku" class="btn btn-success">Input</a>
        <a href="/tampilkan_buku/{{ $row->id }}" class="btn btn-info">Edit</a>
        <a href="/delete_buku/{{ $row->id }}" class="btn btn-danger">Hapus</a>
        @endif
        @if (auth()->user()->level=="user")

                <a href="/buku" class="btn btn-success">Pinjam</a>
            </form>
        @endif
    </td>
</tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div>
    
</body>
@endsection


