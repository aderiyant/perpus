@extends('layouts.dasboard')

@section('container')

<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/insert_buku" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kodebuku" class="col-sm-3 col-form-label">Kode Buku:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="kodebuku" class="form-control" id="kodebuku">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judul" class="col-sm-3 col-form-label">Judul Buku:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="judul" class="form-control" id="judul">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rak" class="col-sm-3 col-form-label">Rak Buku:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="rak" class="form-control" id="rak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pengarang" class="col-sm-3 col-form-label">Pengarang:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pengarang" class="form-control" id="pengarang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori:</label>
                                <div class="col-sm-9">
                                    <select name="kategori" class="form-control" id="kategori">
                                        <option value="1">Akademik</option>
                                        <option value="2">Non-Akademik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status:</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control" id="status">
                                        <option value="tersedia">Tersedia</option>
                                        <option value="tidak tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
