<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERPUSTAKAAN </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <script src="script.js defer"></script>
</head>

<body class="col-12 col-md-8 offset-md-2">
<div style="width: 1425px; height: 65px; left: 0px; top: 0px; position: fixed; background: rgba(49, 125, 107, 0.41)">
</div>
    <div
        style="width: 290px; height: 1024px; left: 0px; top: 0px; position: fixed; background: rgba(45, 120, 124, 0.53)" class="col-12 col-md-8 ">
        <p
            style="left: 20px; top: 10px; position: fixed; color: white; font-size: 30px; font-family: Inter; font-weight: 700; word-wrap: break-word">
            PERPUSTAKAAN</p>

            
        <p  style="left: 120px; top: 130px;  position: absolute; color: black; font-size: 16px; font-family: Inter; font-weight: 700; word-wrap: break-word">
            Halo {{auth()->user()->namalengkap}}</p>
    <div class="d-flex align-items-start" style="left: 10px; top: 250px;  position: absolute; color: black; font-size: 16px; font-family: Inter; font-weight: 700; word-wrap: break-word">
        <div class="nav flex-column nav-pills me-3 col-12 col-md-8 offset-md-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <ul>
            @if (auth()->user()->level=="user")
            <a class="nav-link active" href="/buku">Buku</a>
            @endif
                     @if (auth()->user()->level=="admin")
            <a class="nav-link active" href="/layouts">DASHBOARD</a><br>
            <a class="nav-link active" href="/buku">Buku</a>
            <a class="nav-link active" href="/siswa">Siswa</a>
            <a class="nav-link active"  href="/rent-logs"> Data Peminjaman</a>
            <a class="nav-link active" href="/pengembalian">Pengembalian</a>

            
            <script src="app.js"></script>
            </div>
                     @endif
        </ul>
        </div>
    </div>
    </div>
</body>
<div class="container mt-4">
    @yield('container')
            </div>
</html>
