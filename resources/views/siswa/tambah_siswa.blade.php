@extends('layouts.dasboard')

@section('container')

            <h1  style="left: 320px; top: 100px; position: absolute;" >Input Data Siswa</h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    
                        <form action="/insert_siswa" method="post" endtype="multipart/form-data"  style="left: 90px; top: 200px; position: absolute;">
                            {{ csrf_field() }}
                            <div class="col-12 col-md-8 offset-md-2">
              
                        <div class="mb-3">
                            <label for="namalengkap" class="form-label">Nama Lengkap:</label>
                            <input type="namelengkap" name="namalengkap" class="form-control" id="namalengkap" aria-describedby="namalengkap">
                        </div>
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin:</label>
                            <select class="form-select"  name="jeniskelamin" class="form-control" id="jeniskelamin" aria-label="Default select example">
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">NIS / NIK:</label>
                            <input type="username" name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <select name="kelas" class="form-control" id="kelas">
                                <option value="X">X </option>
                                <option value="XI">XI </option>
                                <option value="XII">XII </option>  
                            </select>
                        </div> 
                        <div class="mb-3">
                            <label for="level" class="form-label">Level:</label>
                            <select name="level" class="form-control" id="nis">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                
                    </div>
                </div>
            </div>
@endsection