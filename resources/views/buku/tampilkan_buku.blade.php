@extends('layouts.dasboard')

@section('container')
<div class="card">
    <div class="card-body">
        <h1 class="text-center">Edit Data Buku</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/update_buku/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kodebuku" class="form-label">Kode Buku:</label>
                        <input type="text" name="kodebuku" class="form-control" id="kodebuku" value="{{ $data->kodebuku }}">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku:</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="{{ $data->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang:</label>
                        <input type="text" name="pengarang" class="form-control" id="pengarang" value="{{ $data->pengarang }}">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori:</label>
                        <select class="form-select" name="kategori" id="kategori">
                            <option value="akademik" {{ $data->kategori == 'akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="non akademik" {{ $data->kategori == 'non akademik' ? 'selected' : '' }}>Non Akademik</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <input type="text" name="status" class="form-control" id="status" value="{{ $data->status }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
