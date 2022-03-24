<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <style>
    body {
      background-color: #398AB9;
    }

    .jumbo {
      width: 100%;
      padding: 235px;
      /* background-image: url(http://localhost/sistem_lelang/assets/img/jumbotron-bg.jpg); */
      background-image: url(http://localhost/sistem_lelang/assets/img/background/6212114.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .text1 {
      font-size: 3em;
      font-weight: 800;
      text-shadow: 5px 8px 3px black;
    }

    .paragraf {
      font-size: 1.8em;
      text-shadow: 3px 5px 3px black;
    }

    .navigasi {
      background-color: #085E7D;
    }
  </style>

  <title>Halaman Home</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark navigasi">
    <div class="container-fluid">
      <a class="navbar-brand mr-5" href="https://instagram.com/rifki.firansah_" style="text-transform: uppercase; font-family:cursive; font-weight: 800; font-size: 1.5em; letter-spacing: 2px;"><i class="fas fa-duotone fa-motorcycle"></i> Ngab auction</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Daftar Lelang</a>
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/history/' . $this->session->userdata('id_user')); ?>">History</a>
          <a href="<?= base_url('user/pemenang'); ?>" class="nav-link active"> Daftar Pemenang</a>
        </div>

      </div>
      <div class="na navbar-nav navbar-right">
        <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-light"><?= $this->session->userdata('nama_lengkap'); ?></span> |
            </a>
          </li>
        </ul>

        <a class="nav-link active" aria-current="page" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </nav>

  <div class="img-fluid jumbo text-light text-center">
    <h3 class="text-uppercase text1">Selamat Datang Di NGab AUction</h3>
    <p class="paragraf">Disini menyediakan barang lelang yang bagus dan berkualitas</p>
  </div>

  <div class="px-4 py-5 text-center bg-light">
    <h1 class="display-5 fw-bold mt-5">Sistem Lelang Online (Ngab Auction)</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 mt-3">Ditujukan untuk memenuhi program Uji Kompetensi Keahlian Rekayasa Perangkat Lunak (RPL) dan sebagai metode pembelajaran untuk memperdalam pengembangan software menggunakan teknologi frontend dan backend serta berguna bagi masyarakat yang ingin membangun sebuah sistem lelang barang secara online.</p>
    </div>
  </div>

  <?php if (count($barang) > 0) { ?>
    <div class="container-fluid">
      <div class="row mt-5 ms-1 mb-2">
        <?php foreach ($barang as $brng) : ?>
          <div class="col-4 mb-5">
            <div class="card mx-auto" style="width: 23rem; height: 32rem;">
              <img src="<?= base_url('assets/img/'); ?><?= $brng->gambar; ?>" class="card-img-top" style="height: 310px;">
              <div class="card-body">
                <h5 class="card-title"><?= $brng->nama_barang; ?></h5>
                <p class="card-text"><?= $brng->deskripsi_barang; ?></p>
                <a href="<?= base_url('user/detail/'); ?><?= $brng->id_lelang; ?>" class="btn btn-success">Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php } else {
    return '';
  } ?>