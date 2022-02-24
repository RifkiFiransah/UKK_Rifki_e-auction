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
      background-color: #398AB9;
    }
  </style>

  <title>Halaman awal</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-50">
    <div class="container-fluid">
      <h1 class="navbar-brand">Sistem Lelang</h1>
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
        <a class="nav-link active" aria-current="page" href="#">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <?php foreach ($barang as $brng) : ?>
        <div class="col-5 mx-auto">
          <div class="card my-5">
            <img src="<?= base_url('assets/img/'); ?><?= $brng->gambar; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?= $brng->nama_barang; ?></h5>
              <p class="card-text"><?= $brng->deskripsi_barang; ?></p>
              <p class="card-text"><small class="text-muted">Rp. <?= number_format($brng->harga_awal, 0, ',', '.'); ?></small></p>
              <a href="<?= base_url('user/tawar/'); ?><?= $brng->id_barang; ?>" class="btn btn-primary">Ajukan Penawaran</a>
              <a href="<?= base_url(); ?>" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>