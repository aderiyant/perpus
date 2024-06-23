@extends('layouts.dasboard')

@section('container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="card">
    <div class="card-body">
        <h1 class="text-center mb-4">Pengembalian Buku</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('alert'))
                <div class="alert alert{{ session('alert-class') }}">
                    {{ session('alert') }}
                </div>
                @endif
                <form action="pengembalian" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="user" class="form-label">User:</label>
                        <select name="user_id" class="form-control select2" id="user">
                            <option value="">Pilih User</option>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->namalengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="buku" class="form-label">Buku:</label>
                        <select name="kodebuku" class="form-control select2" id="buku">
                            <option value="">Pilih Buku</option>
                            @foreach ($bukus as $item)
                            <option value="{{ $item->id }}">{{ $item->kodebuku }} - {{ $item->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
