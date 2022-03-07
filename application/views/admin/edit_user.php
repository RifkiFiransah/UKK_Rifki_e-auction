<div class="container-fluid">
  <h3><i class="fas fa-edit"></i> Edit User</h3>

  <?php foreach ($user as $row) : ?>
    <form action="<?= base_url('data_user/update_data'); ?>" method="POST">
      <input type="hidden" name="id_user" value="<?= $row->id_user; ?>">
      <input type="hidden" name="password_lama" value="<?= $row->password; ?>">
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama" value="<?= $row->nama_lengkap; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $row->username; ?>">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <div class="form-group">
        <label for="telp">telp</label>
        <input type="number" name="telp" id="telp" value="<?= $row->telp; ?>" class="form-control">
      </div>

      <a href="<?= base_url('data_user'); ?>" class="btn btn-danger">Kembali</a>

      <button type="submit" class="btn btn-primary">Edit Data</button>
    </form>
  <?php endforeach; ?>
</div>