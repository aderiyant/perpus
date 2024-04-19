@extends('layouts.dasboard')

@section('container')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERPUSTAKAAN | BUKU</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <script src="script.js defer"></script>
</head>
<body>
            <h1  style="left: 320px; top: 100px; position: absolute;">Edit Data Buku</h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <form action="/update_buku/{{$data->id}}" method="post" endtype="multipart/form-data"  style="left: 320px; top: 200px; position: absolute;">
                            {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="kodebuku" class="form-label">Kode Buku:</label>
                            <input type="kodebuku" name="kodebuku" class="form-control" id="kodebuku" aria-describedby="kodebuku" value="{{ $data->kodebuku}}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku:</label>
                            <input type="judul" name="judul" class="form-control" id="judul" aria-describedby="judul" value="{{ $data->judul}}">
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang:</label>
                            <input type="pengarang" name="pengarang" class="form-control" id="pengarang"  value="{{ $data->pengarang }}">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">kategori:</label>
                            <select class="form-select" name="kategori" class="form-control" id="kategori"  value="{{ $data->kategori }} aria-label="Default select example">
                                <option value="1">Akademik</option>
                                <option value="2">Non Akademik</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <input type="status" name="status" class="form-control" id="status" aria-describedby="status" value="{{ $data->status}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <div class="card-body">

                    </div>
                    </div>
                </div>
            </div>
    
</body>
@endsection