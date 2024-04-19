@extends('layouts.dasboard')

@section('container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h1 style="left: 320px; top: 100px; position: absolute;">Pengembalian</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 offset-md-2">
            <form action="pengembalian" method="POST" endtype="multipart/form-data"
                style="left: 320px; top: 200px; position: absolute;">
                <div class="card">
                <div>
                    @if (session('message'))
                    <div class="alert alert{{ session('alert-class') }}">
                        {{ session('message') }}
                </div>
                    @endif
                </div>
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">User:</label>
                    <select type="user" name="user_id" class="form-control inputbox" id="user" aria-describedby="user" value="">
                        <option value="">Select User</option>
                        @foreach ($users as $item)
                        <option value="{{ $item->id }}"> {{ $item->namalengkap}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="buku" class="form-label">Buku:</label>
                    <select type="buku" name="kodebuku" class="form-control inputbox" id="buku" aria-describedby="buku" value="">
                        <option value="">Select Buku</option>
                        @foreach ($bukus as $item)
                        <option value="{{ $item->id }}">{{ $item->kodebuku }} {{ $item->judul}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
            $('.inputbox').select2();
        });
</script>
@endsection