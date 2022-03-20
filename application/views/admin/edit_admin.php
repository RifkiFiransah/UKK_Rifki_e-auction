<div class="container-fluid">
  <h3><i class="fas fa-edit"></i> Edit Administrator</h3>

  <?php foreach ($admin as $adm) : ?>
    <form action="<?= base_url('data_admin/edit_data'); ?>" method="POST">
      <input type="hidden" name="password_lama" value="<?= $adm->password; ?>">
      <input type="hidden" name="id_petugas" value="<?= $adm->id_petugas; ?>">
      <div class="form-group">
        <label for="nama">Nama Petugas</label>
        <input type="text" name="nama_petugas" id="nama" class="form-control" value="<?= $adm->nama_petugas; ?>" required>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $adm->username; ?>" required>
        <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
      </div>

      <div class="form-group">
        <label for="level">Level</label>
        <select class="form-control" name="id_level">
          <option value="" disabled selected>!---------Pilih----------!</option>
          <option value="1">Petugas</option>
          <option value="2">Admin</option>
        </select>
      </div>

      <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" id="password" class="form-control">
        <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
      </div>

      <div class="form-group">
        <label for="password_confirm">password confirm</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
        <?= form_error('password_confirm', '<div class="text-danger small ml-2">', '</div>'); ?>
      </div>

      <a href="<?= base_url('data_barang'); ?>" class="btn btn-danger">Kembali</a>

      <button type="submit" class="btn btn-primary">Edit Data</button>
    </form>
  <?php endforeach; ?>
</div>