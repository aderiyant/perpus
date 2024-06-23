@extends('layouts.dasboard')

@section('container')
<div class="card">
    <div class="card-body">
        <h1 class="text-center">Input Data Siswa</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/insert_siswa" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label for="namalengkap" class="form-label">Nama Lengkap:</label>
                        <input type="text" name="namalengkap" class="form-control" id="namalengkap">
                    </div>

                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">NIS / NIK:</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <select name="kelas" class="form-select" id="kelas">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level:</label>
                        <select name="level" class="form-select" id="level">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
