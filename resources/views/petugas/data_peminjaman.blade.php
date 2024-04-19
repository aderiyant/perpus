@extends('layouts.dasboard')

@section('container')
<div>
    <table id="tabelSiswa" style="left: 330px; top: 120px; position: absolute;  width:60%">
    <div>
                    @if (session('message'))
                    <div class="alert alert{{ session('alert-class') }}">
                        {{ session('message') }}
                </div>
                    @endif
                </div>
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rent_logs as $item)
            <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date
                    < $item->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->namalengkap}}</td>
                <td>{{ $item->buku->judul}}</td>
                <td>{{ $item->rent_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->actual_return_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection