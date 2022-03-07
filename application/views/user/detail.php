<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/favicon-16x16.png">
  <link rel="manifest" href="<?= base_url() ?>/assets/images/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/LineIcons.3.0.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css" />

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #398AB9;
    }

    .navigasi {
      background-color: #085E7D;
    }
  </style>

  <title>Halaman awal</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark navigasi">
    <div class="container-fluid">
      <a class="navbar-brand mr-5" href="<?= base_url(); ?>" style="text-transform: uppercase; font-family:cursive; font-weight: 800; font-size: 1.5em; letter-spacing: 2px;">Sistem Lelang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Daftar Lelang</a>
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/history/' . $this->session->userdata('id_user')); ?>">History</a>
        </div>

      </div>
      <div class="na navbar-nav navbar-right">
        <a class="nav-link active" aria-current="page" href="<?= base_url('auth/logout'); ?>">Logout</a>
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
              <a href="<?= base_url('user/tawar/'); ?><?= $brng->id_lelang; ?>" class="btn btn-primary">Ajukan Penawaran</a>
              <a href="<?= base_url(); ?>" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="product-details-info">
      <div class="row mb-5">
        <div class="col-lg-8 col-8 mx-auto">
          <div class="single-block">
            <div class="reviews">
              <h4 class="title">Top 10 Bid</h4>

              <?php
              if (count($history) > 0) :
                foreach ($history as $h1) :
              ?>
                  <div class="single-review">
                    <img src="https://ui-avatars.com/api/?name=<?= $h1->nama_lengkap; ?>" alt="<?= $h1->nama_lengkap; ?>">
                    <div class="review-info">
                      <h4><?= $h1->nama_lengkap; ?></h4>
                      <p>RP. <?= number_format($h1->penawaran_harga, 0, ',', '.'); ?></p>
                    </div>
                  </div>
                <?php endforeach;
              else :
                ?>
                <p>Tidak ada data</p>
              <?php endif;
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>