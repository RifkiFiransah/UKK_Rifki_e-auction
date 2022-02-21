<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    body {
      background-image: linear-gradient(to right, blue, cyan);
    }

    .jumbo {
      width: 100%;
      padding: 200px;
      background-image: url(http://localhost/sistem_lelang/assets/img/jumbotron-bg.jpg);
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
  </style>

  <title>Halaman Home</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-50">
    <div class="container-fluid">
      <a class="navbar-brand mr-5" href="<?= base_url(); ?>" style="text-transform: uppercase; font-family:cursive; font-weight: 800; font-size: 1.5em; letter-spacing: 2px;">Sistem Lelang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Daftar Lelang</a>
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/history'); ?>">History</a>
        </div>

      </div>
      <div class="na navbar-nav navbar-right">
        <a class="nav-link active" aria-current="page" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </nav>

  <div class="img-fluid jumbo text-light text-center">
    <h3 class="text-uppercase text1">Selamat Datang Di Lelang Online</h3>
    <p class="paragraf">Disini menyediakan barang lelang yang bagus dan berkualitas</p>
  </div>

  <div class="container-fluid">
    <div class="row mt-4 ms-1 mb-lg-5">
      <?php foreach ($barang as $brng) : ?>
        <div class="col-4 mb-5">
          <div class="card mx-auto" style="width: 23rem; height: 32rem;">
            <img src="<?= base_url('assets/img/'); ?><?= $brng->gambar; ?>" class="card-img-top" style="height: 310px;">
            <div class="card-body">
              <h5 class="card-title"><?= $brng->nama_barang; ?></h5>
              <p class="card-text"><?= $brng->deskripsi_barang; ?></p>
              <a href="<?= base_url('user/detail/'); ?><?= $brng->id_barang; ?>" class="btn btn-success">Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <br><br>