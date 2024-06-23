@extends('layouts.dasboard')

@section('container')
<div class="card">
    <div class="card-body">
        <h1 class="text-center">Edit Data Siswa</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/update_siswa/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label">Nama Lengkap:</label>
                        <input type="text" name="namalengkap" class="form-control" id="namalengkap" value="{{ $data->namalengkap }}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">NIS / NIK:</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{ $data->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                            <option value="1" {{ $data->jeniskelamin == '1' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="2" {{ $data->jeniskelamin == '2' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $data->kelas }}">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level:</label>
                        <input type="text" name="level" class="form-control" id="level" value="{{ $data->level }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ $data->password }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
