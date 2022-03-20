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
      /* overflow-y: hidden; */
      height: 62px;
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
      <a class="navbar-brand mr-5" href="https://instagram.com/rifki.firansah_" style="text-transform: uppercase; font-family:cursive; font-weight: 800; font-size: 1.5em; letter-spacing: 2px;"><i class="fas fa-duotone fa-motorcycle"></i> Ngab Auction</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Daftar Lelang</a>
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/history/' . $this->session->userdata('id_user')); ?>">History</a>
          <a href="<?= base_url('user/pemenang'); ?>" class="nav-link active">Daftar Pemenang</a>
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

  <h1 class="text-center" style="font-size: 2.5em; text-transform:uppercase; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; margin-top: 20px; word-spacing: 4px; letter-spacing: 1px;">Daftar Pemenang Lelang</h1>
  <div class="container-fluid mt-3" style="height: 800%;">
    <div class="row">
      <div class="col">
        <table class="table table-bordered">
          <tr class="bg-info text-light">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tanggal Lelang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Pemenang Lelang</th>
          </tr>

          <?php $i = 1; ?>
          <?php foreach ($pemenang as $row) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $row->nama_barang; ?></td>
              <td><?= $row->tgl_lelang; ?></td>
              <td>Rp. <?= number_format($row->harga_awal, 0, ',', '.'); ?></td>
              <td>Rp. <?= number_format($row->harga_akhir, 0, ',', '.'); ?></td>
              <td><?= $row->nama_lengkap; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>