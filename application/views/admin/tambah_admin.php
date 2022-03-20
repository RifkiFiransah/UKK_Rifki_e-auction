<div class="container-fluid">
  <h3><i class="fas fa-plus"></i> Tambah Barang</h3>

  <form action="<?= base_url('data_admin/input_data'); ?>" method="POST">

    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" name="nama_petugas" id="nama" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" class="form-control" required>
      <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
    </div>

    <div class="form-group">
      <label for="level">Level</label>
      <select class="form-control" name="id_level">
        <option value="">Pilih</option>
        <option value="" disabled selected>!---------Pilih----------!</option>
        <?php foreach ($admin as $row) : ?>
          <option value="<?= $row->id_level; ?>"><?= $row->level; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="password">password</label>
      <input type="password" name="password" id="password" class="form-control" required>
      <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
    </div>

    <div class="form-group">
      <label for="password_confirm">password confirm</label>
      <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
      <?= form_error('password_confirm', '<div class="text-danger small ml-2">', '</div>'); ?>
    </div>

    <a href="<?= base_url('data_barang'); ?>" class="btn btn-danger">Kembali</a>

    <button type="submit" class="btn btn-primary">Tambah Data</button>
  </form>
</div>