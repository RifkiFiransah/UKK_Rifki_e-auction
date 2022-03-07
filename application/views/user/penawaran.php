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
      background-image: linear-gradient(to right, blue, purple, pink);
    }

    .navigasi {
      background-color: #085E7D;
    }
  </style>

  <title>Halaman <?= $this->session->userdata('username'); ?></title>
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

  <div class="container-fluid mt-5" style="height: 570px;">
    <div class="row">
      <div class="col-md-6 mx-auto mb-3">
        <form action="<?= base_url('user/penawaran'); ?>" method="POST" class="table table-striped text-light">
          <?php foreach ($barang as $row) : ?>
            <input type="hidden" name="id_barang" value="<?= $row->id_barang; ?>">
            <input type="hidden" name="id_lelang" value="<?= $row->id_lelang; ?>">
            <div class="form-group">
              <label for="id_user">id_user :</label>
              <input type="number" name="id_user" id="id_user" class="form-control" value="<?= $this->session->userdata('id_user'); ?>" readonly>
            </div>

            <div class="form-group">
              <label for="username">Username :</label>
              <input type="text" name="username" id="username" class="form-control" value="<?= $this->session->userdata('username'); ?>" readonly>
            </div>

            <div class="form-group">
              <label for="nama">Nama Barang :</label>
              <input type="text" name="nama_barang" id="nama" class="form-control" value="<?= $row->nama_barang; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="harga">Harga Awal :</label>
              <input type="text" name="harga_awal" class="form-control" readonly value="<?= $row->harga_awal; ?>">
            </div>

            <div class="form-group">
              <label for="tawar">Harga Tawaran :</label>
              <input type="number" name="penawaran" id="tawar" class="form-control" required>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-primary">Penawaran</button>
          <a href="<?= base_url('user/detail/' . $row->id_lelang); ?>" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>