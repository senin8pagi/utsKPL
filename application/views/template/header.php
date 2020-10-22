<!DOCTYPE html>
<html>
<head>
  <title><?= $title ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.4/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Data Table -->
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <style>
    .scroll-to-top {
      position: fixed;
      right: 15px;
      bottom: 15px;
      display: none;
      width: 50px;
      height: 50px;
      text-align: center;
      color: #fff;
      background: rgba(52, 58, 64, 0.5);
      line-height: 46px;
    }

    .scroll-to-top:focus, .scroll-to-top:hover {
      color: white;
    }

    .scroll-to-top:hover {
      background: #343a40;
    }

    .scroll-to-top i {
      font-weight: 800;
    }

    datalist {
display: none;
}

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" id="page-top">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-md-0">
            <li class="nav-item ">
                <a class="nav-link dropdown-toggle"style="text-align: center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i><span class="ml-2 mr-1"><?= $this->session->userdata("nama_guru");?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url("gantiPassword/pengguna/")?><?= $this->session->userdata("nip");?>">Ganti Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
      <img src="<?= base_url() ?>assets/AdminLTE-3.0.4/dist/img/AdminLTELogo.png" alt="PSS MARDISISWA" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PSS MARDISISWA</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
        <!-- <div class="image">
          <img src="<?= base_url() ?>assets/AdminLTE-3.0.4/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block "><?= $this->session->userdata("nama_guru");?></a>
        </div>
      </div> -->
      
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item active">
            <a href="<?= base_url("dashboard")?>" class="nav-link <?php if($title == "Dashboard") echo "active"?>">
              <i class="nav-icon fa fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if($this->session->userdata("jabatan") == "admin"){?>
          <li class="nav-item has-treeview <?php if($title == "Kelola User" || $title == "Kelola Siswa" || $title == "Kelola Kelas" || $title == "Kelola Semester") echo "menu-open"?>">
            <a href="#" class="nav-link <?php if($title == "Kelola User" || $title == "Kelola Siswa" || $title == "Kelola Kelas") echo "active"?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Kelola
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("kelola/user")?>" class="nav-link <?php if($title == "Kelola User") echo "active"?> ml-2">
                  <i class="fa fa-user-edit nav-icon"></i>
                  <p>Kelola User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("kelola/siswa")?>" class="nav-link <?php if($title == "Kelola Siswa") echo "active"?> ml-2">
                  <i class="fa fa-user-edit nav-icon"></i>
                  <p>Kelola Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("kelola/kelas")?>" class="nav-link <?php if($title == "Kelola Kelas") echo "active"?> ml-2">
                  <i class="fa fa-school nav-icon"></i>
                  <p>Kelola Kelas</p>
                </a>
              </li>
              <li class="nav-item active">
                <a href="<?= base_url("kelola/semester")?>" class="nav-link <?php if($title == "Kelola Semester") echo "active"?> ml-2">
                  <i class="nav-icon fa fa-home"></i>
                  <p>Kelola Semester</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item active">
            <a href="<?= base_url("kelola/penempatan_kelas")?>" class="nav-link <?php if($title == "Kelola Penempatan Kelas") echo "active"?>">
              <i class="nav-icon fa fa-home"></i>
              <p>Penempatan Kelas</p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($title == "Kelola Daftar Prestasi" || $title == "Kelola Daftar Pelanggaran" || $title == "Kelola Jenis Prestasi" || $title == "Kelola Jenis Pelanggaran") echo "menu-open"?>">
            <a href="#" class="nav-link <?php if($title == "Kelola Daftar Prestasi" || $title == "Kelola Daftar Pelanggaran") echo "active"?>">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Daftar Skor
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url("kelola/jenis_prestasi")?>" class="nav-link <?php if($title == "Kelola Jenis Prestasi") echo "active"?> ml-2">
                  <i class="fa fa-balance-scale-right nav-icon"></i>
                  <p>Jenis Prestasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url("kelola/jenis_pelanggaran")?>" class="nav-link <?php if($title == "Kelola Jenis Pelanggaran") echo "active"?> ml-2">
                  <i class="fa fa-balance-scale-left nav-icon"></i>
                  <p>Jenis Pelanggaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url("kelola/prestasi")?>" class="nav-link <?php if($title == "Kelola Daftar Prestasi") echo "active"?> ml-2">
                  <i class="fa fa-balance-scale-right nav-icon"></i>
                  <p>Daftar Prestasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("kelola/pelanggaran")?>" class="nav-link <?php if($title == "Kelola Daftar Pelanggaran") echo "active"?> ml-2">
                  <i class="fa fa-balance-scale-left nav-icon"></i>
                  <p>Daftar Pelanggaran</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview <?php if($title == "Pencatatan Prestasi" || $title == "Pencatatan Pelanggaran") echo "menu-open"?>">
            <a href="#" class="nav-link <?php if($title == "Pencatatan Prestasi" || $title == "Pencatatan Pelanggaran") echo "active"?>">
              <i class="nav-icon fas fa-pen-alt"></i>
              <p>
                Pencatatan Skor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url("catat/PencatatanPrestasi")?>" class="nav-link <?php if($title == "Pencatatan Prestasi") echo "active"?> ml-2">
                  <i class="fa fa-star nav-icon"></i>
                  <p>Pencatatan Prestasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url("catat/PencatatanPelanggaran")?>" class="nav-link <?php if($title == "Pencatatan Pelanggaran") echo "active"?> ml-2">
                  <i class="fa fa-skull nav-icon"></i>
                  <p>Pencatatan Pelanggaran</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item ">
            <a href="<?= base_url("kelola/sanksi")?>" class="nav-link <?php if($title == "Kelola Sanksi") echo "active"?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Daftar Penanganan</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?= base_url("Cetak/laporan")?>" class="nav-link <?php if($title == "Pencetakan Laporan") echo "active"?>">
              <i class="nav-icon fa fa-print"></i>
              <p>Cetak Laporan</p>
            </a>
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
    <div class="mt-2"></div>
    <!-- /.content-header -->

    <!-- Main content -->