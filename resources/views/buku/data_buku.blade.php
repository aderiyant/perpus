@extends('layouts.dasboard')

@section('container')
<body>
    <div class="container">
        <div class="col-md-10">
            @if (session('message'))
            <div class="alert alert{{ session('alert-class') }}">
                {{ session('message') }}
            </div>
            @endif
            <div style="position: relative;">
                <h1>Data Buku</h1>
                @if (auth()->user()->level == "admin")
                <a href="/tambah_buku" class="btn btn-success" style="position: absolute; top: 0; right: 0;">Input</a>
                @endif
            </div>

            <!-- Form Pencarian -->
            <form action="{{ route('cari_buku') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari buku..." name="search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>

            <!-- Form Filter Kategori -->
            <form action="{{ route('cari_buku') }}" method="GET">
                <div class="input-group mb-3">
                    <select class="form-control" name="kategori">
                        <option value="">Semua kategori</option>
                        <option value="akademik">Akademik</option>
                        <option value="non akademik">Non-Akademik</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </form>

            <table class="table" id="tabelbuku" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">kodebuku</th>
                        <th scope="col">judul</th>
                        <th scope="col">pengarang</th>
                        <th scope="col">kategori</th>
                        <th scope="col">status</th>
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
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->kodebuku }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->pengarang }}</td>
                        <td>{{ $row->kategori }}</td>
                        <td>{{ $row->status }}</td>
                        <td>
                            @if (auth()->user()->level == "admin")
                            <a href="/tampilkan_buku/{{ $row->id }}" class="btn btn-info">Edit</a>
                            <a href="/delete_buku/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                            @endif
                            @if (auth()->user()->level == "user")
                            <a href="/buku" class="btn btn-success">Pinjam</a>
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
