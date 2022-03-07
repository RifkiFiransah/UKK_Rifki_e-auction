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
      overflow-y: hidden;
      height: 70px;
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
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/history' . $this->session->userdata('id_user')); ?>">History</a>
        </div>

      </div>
      <div class="na navbar-nav navbar-right">
        <a class="nav-link active" aria-current="page" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-3" style="height: 800%;">
    <div class="row">
      <div class="col">
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>Tanggal Lelang</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Penawaran Harga</th>
          </tr>

          <?php $i = 1; ?>
          <?php foreach ($history as $row) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $row->tgl_lelang; ?></td>
              <td><?= $row->nama_barang; ?></td>
              <td><?= $row->harga_awal; ?></td>
              <td>Rp. <?= number_format($row->penawaran_harga, 0, ',', '.'); ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>