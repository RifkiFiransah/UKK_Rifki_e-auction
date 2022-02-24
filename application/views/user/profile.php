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
      /* background-color: #398AB9; */
      overflow-y: hidden;
      height: 70px;
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
      <a class="navbar-brand mr-5" href="<?= base_url(); ?>" style="text-transform: uppercase; font-family:cursive; font-weight: 800; font-size: 1.5em; letter-spacing: 2px;">Sistem Lelang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Daftar Lelang</a>
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/history'); ?>">History</a>
          <a class="nav-link active" aria-current="page" href="<?= base_url('user/profile/' . $this->session->userdata('id_user')); ?>">Profile</a>
        </div>

      </div>
      <div class="na navbar-nav navbar-right">
        <a class="nav-link active" aria-current="page" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-3" style="height: 730%;">
    <div class="row">
      <div class="col">
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Telp</th>
          </tr>

          <?php foreach ($user as $row) : ?>
            <tr>
              <td>1</td>
              <td><?= $row->nama_lengkap; ?></td>
              <td><?= $row->username; ?></td>
              <td><?= $row->telp; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
  <br><br>