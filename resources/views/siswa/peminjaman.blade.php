@extends('layouts.dasboard')

@section('container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h1 style="left: 320px; top: 100px; position: absolute;">Peminjaman</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
                <div class="col-12 col-md-8 offset-md-2">
            <form action="/book-rent" method="POST" endtype="multipart/form-data"
                style="left: 320px; top: 200px; position: absolute;">
                <div>
                    @if (session('message'))
                    <div class="alert alert{{ session('alert-class') }}">
                        {{ session('message') }}
                </div>
                    @endif
                </div>
                @csrf
                <div class="form-group row mt-3">
                            <label for="buku" class="col-md-4 col-form-label text-right">Buku</label>
                            <div class="col-md-6">
                                <select class="form-control inputbox" id="buku" name="kodebuku" aria-label="buku">
                                    <option value="">Choose</option>
                                    @foreach($bukus as $val)
                                    <option value="{{$val->id}}">{{$val->judul}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('buku'))
                                <span class="text-danger">{{ $errors->first('buku') }}</span>
                                @endif
                            </div>
                        </div>
  
                          <div class="form-group row mt-3">
                              <label for="rent_date" class="col-md-4 col-form-label text-right">pinjam  dari</label>
                              <div class="col-md-6">
                                  <input type="date" id="rent_date" class="form-control" name="rent_date" required autofocus>
                                  @if ($errors->has('rent_date'))
                                      <span class="text-danger">{{ $errors->first('rent_date') }}</span>
                                  @endif
                              </div>
                          </div>
                          <br>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.inputbox').select2();
    });
</script>
@endsection


