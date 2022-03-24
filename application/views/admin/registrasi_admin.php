<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-duotone fa-motorcycle"></i> Registrasi Administrator</h1>
                  </div>
                  <?= $this->session->flashdata('pesan'); ?>
                  <form method="post" action="<?= base_url('auth/tambah_admin'); ?>" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan nama admin..." name="nama_admin" autocomplete="off" autofocus>
                      <?= form_error('nama_admin', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan username anda..." name="username" autocomplete="off" autofocus>
                      <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password..." name="password">
                      <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>

                    <a href="<?= base_url('auth/login_admin'); ?>">Kembali ke Login</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets'); ?>/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets'); ?>/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets'); ?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>