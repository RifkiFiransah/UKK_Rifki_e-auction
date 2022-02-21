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
      height: 380px;
    }

    body {
      /* background-image: url(http://localhost/sistem_lelang/assets/img/vector.png);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center; */
      /* background-color: rgba(0, 0, 0, 0.5); */
      background-image: linear-gradient(to right, blue, cyan);
      padding: 100px;
      overflow: hidden;
    }
  </style>

  <title>Login Sistem Lelang Online</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12" style="height: 500px;">
        <div class="card mx-auto my-3 kartu" style="width: 30rem;">
          <div class="card-body">
            <h2 class="card-title text-center mb-5">Login Sistem Lelang</h2>
            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('auth/login'); ?>" class="user mt-3 mb-3" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Masukan Username" name="username" autofocus autocomplete="off">
                <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <div class="form-group mt-md-4">
                <input type="password" class="form-control" placeholder="Masukan Password" name="password">
                <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
              </div>
              <button type="submit" class="form-control btn btn-primary mt-2">Login</button>
            </form>
            <a href="<?= base_url('auth/registrasi'); ?>" class="mt-4"> Belum punya akun? Registarsi</a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>