<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .kartu {
      height: 590px;
    }

    body {
      /* background-image: url(http://localhost/sistem_lelang/assets/img/vector.png);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center; */
      background-image: linear-gradient(to right, blue, cyan);
      padding: 50px;
      overflow: hidden;
    }
  </style>

  <title>Login Sistem Lelang Online</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12" style="height: 500px;">
        <div class="card mx-auto kartu" style="width: 60%;">
          <div class="card-body">
            <h2 class="text-center card-title mb-3">Registrasi Sistem Lelang</h2>
            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('auth/tambah_user'); ?>" class="user mb-3" method="post">
              <div class="form-group">
                <label for="Nama">Nama Lengkap :</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama_lengkap" required>
                <?= form_error('nama_lengkap', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="username">Username :</label>
                <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="telp">No Telp :</label>
                <input type="number" class="form-control" placeholder="Masukan No telepon" name="telp" required>
                <?= form_error('telp', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <div class="form-group mt-md-4">
                <label for="password">Password :</label>
                <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
                <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <div class="form-group mt-md-4">
                <label for="konfirmasi">konfirmasi Password :</label>
                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirm" required>
                <?= form_error('password_confirm', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <button type="submit" class="btn btn-primary mt-1">Registrasi</button>
              <a href="<?= base_url('auth'); ?>" class="btn btn-danger mt-1">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>