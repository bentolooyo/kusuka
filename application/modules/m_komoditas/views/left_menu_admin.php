<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Kusuka<sup>Inv</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-wrench"></i>
      <span>Master Pengguna</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Pengguna:</h6>
        <a class="collapse-item"href="<?php echo base_url('user'); ?>">Master User</a>
        <a class="collapse-item" href="http://localhost/phpmyadmin/db_export.php?db=kusuka">Master Backup</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

        <i class="fas fa-fw fa-cog"></i>
      <span>Master Data</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Data:</h6>
        <a class="collapse-item" href="<?php echo base_url('m_alamat_kecamatan'); ?>">Master Kecamatan</a>
        <a class="collapse-item" href="<?php echo base_url('m_alamat_desa'); ?>">Master Desa</a>
        <a class="collapse-item" href="<?php echo base_url('m_kelompok'); ?>">Master Kelompok</a>
        <a class="collapse-item" href="<?php echo base_url('m_komoditas'); ?>">Master Komoditas</a>
          <a class="collapse-item" href="<?php echo base_url('m_kelas_kelompok'); ?>">Master Kelas</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Transaksi
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data Transaksi</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Barang Invertory:</h6>
        <a class="collapse-item" href="<?php echo base_url('t_lapor/tambah') ?>"><i class="fa fa-plus"></i> Tambah Data</a>
        <a class="collapse-item" href="<?php echo base_url('t_lapor') ?>">  <i class="fas fa-fw fa-folder"></i> List Data</a>
        <a class="collapse-item" href="<?php echo base_url('laporan/') ?>"> <i class="fas fa-fw fa-eye"></i> Pencarian Data</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Menu Lain:</h6>
        <!-- <a class="collapse-item" href="<?php echo base_url('t_lapor/diagram') ?>" > <i class="fa fa-university"></i>  Diagram</a> -->
        <a class="collapse-item" href="<?php echo base_url('laporan/cetak') ?>" > <i class="fa fa-print"></i> Cetak Data</a>
      </div>
    </div>
  </li>




  <!-- <li class="nav-item">
    <a class="nav-link"href="<?php echo base_url('diagram') ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Diagram</span></a>
  </li> -->

  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
