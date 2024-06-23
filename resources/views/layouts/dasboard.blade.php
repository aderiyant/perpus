<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PERPUSTAKAAN | SMK Miftahussalam</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">

  <!-- Additional stylesheets or overrides -->
  <style>
    .nav-link {
      white-space: nowrap; /* Prevent text wrapping */
    }

    .brand-link {
      display: flex;
      align-items: center;
      height: 50px;
      padding: 0 15px;
    }

    .brand-link img {
      width: 30px; /* Adjust the width as needed */
      height: auto; /* Maintain aspect ratio */
      margin-right: 10px;
    }

    .brand-link .brand-text {
      font-size: 1.25rem; /* Adjust font size */
      font-weight: 300; /* Adjust font weight */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Account: Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <p class="greeting">Halo {{ auth()->user()->namalengkap }}</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="img/1.PNG" alt="Logo">
      <span class="brand-text font-weight-light">PERPUSTAKAAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Menu with submenus -->
          <li class="nav-item">
            @if (auth()->user()->level == "user")
            <a class="nav-link {{ Request::is('buku') ? 'active' : '' }}" href="/buku">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
            <a class="nav-link {{ Request::is('riwayat_peminjaman') ? 'active' : '' }}" href="/riwayat_peminjaman">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Riwayat Peminjaman
              </p>
            </a>
            @endif
            @if (auth()->user()->level == "admin")
            <a class="nav-link {{ Request::is('buku') ? 'active' : '' }}" href="/buku">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
            <a class="nav-link {{ Request::is('siswa') ? 'active' : '' }}" href="/siswa">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Siswa
              </p>
            </a>
            <a class="nav-link {{ Request::is('rent-logs') ? 'active' : '' }}" href="/rent-logs">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Data Peminjaman
              </p>
            </a>
            <a class="nav-link {{ Request::is('pengembalian') ? 'active' : '' }}" href="/pengembalian">
              <i class="nav-icon fas fa-undo"></i>
              <p>
                Pengembalian
              </p>
            </a>
            @endif
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Your content here -->
        @yield('container')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Powered by Aderiyanto
    </div>
    <strong>&copy; 2024 <a href="#">Aderiyanto</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<!-- Additional scripts -->
<!-- Example: <script src="path/to/custom.js"></script> -->
</body>
</html>
