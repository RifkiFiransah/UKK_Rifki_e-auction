<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-solid fa-motorcycle"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Ngab <sup> auction</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Fitur
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data_barang'); ?>">
          <i class="fas fa-solid fa-bookmark"></i>
          <span>Data Barang</span></a>
      </li>

      <?php if ($this->session->userdata('id_level') == 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('data_lelang'); ?>">
            <i class="fas fa-duotone fa-dumpster"></i>
            <span>Data Lelang</span></a>
        </li>
      <?php } else if ($this->session->userdata('id_level') == 2) { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?= base_url('data_admin'); ?>" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Data Administrator</span>
          </a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('data_user'); ?>" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user-circle"></i>
          <span>Data User dan Masyarakat</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('laporan'); ?>" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-download"></i>
          <span>Generate Laporan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout_a'); ?>" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_petugas'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('auth/logout_a'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->