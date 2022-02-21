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
  </style>

  <title>Halaman <?= $this->session->userdata('username'); ?></title>
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

  <div class="container-fluid mt-5" style="height: 570px;">
    <div class="row">
      <div class="col-md-6 mx-auto mb-3">
        <form action="<?= base_url('data_lelang/penawaran'); ?>" method="POST" class="table table-striped">
          <?php foreach ($barang as $row) : ?>
            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
            <input type="hidden" name="id_barang" value="<?= $row->id_barang; ?>">
            <div class="form-group">
              <label for="nama">Nama Barang :</label>
              <input type="text" name="nama_barang" id="nama" class="form-control" value="<?= $row->nama_barang; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="harga">Harga Awal :</label>
              <input type="number" name="harga_awal" id="harga" class="form-control" value="<?= $row->harga_awal; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="tawar">Harga Tawaran :</label>
              <input type="number" name="tawaran" id="tawar" class="form-control" required>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-primary">Penawaran</button>
        </form>
      </div>
    </div>
  </div>