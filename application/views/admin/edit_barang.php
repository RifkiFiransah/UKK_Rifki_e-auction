<div class="container-fluid">
  <h3><i class="fas fa-edit"></i> Edit Barang</h3>

  <?php foreach ($barang as $brng) : ?>
    <form action="<?= base_url('data_barang/update_data'); ?>" method="POST">
      <input type="hidden" name="id_barang" value="<?= $brng->id_barang; ?>">
      <input type="hidden" name="gambar" value="<?= $brng->gambar; ?>">

      <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama" value="<?= $brng->nama_barang; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="tgl">Tanggal</label>
        <input type="date" name="tgl" id="tgl" value="<?= $brng->tgl; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga_awal" id="harga" value="<?= $brng->harga_awal; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi_barang" id="deskripsi" value="<?= $brng->deskripsi_barang; ?>" class="form-control">
      </div>

      <a href="<?= base_url('data_barang'); ?>" class="btn btn-danger">Kembali</a>

      <button type="submit" class="btn btn-primary">Edit Data</button>
    </form>
  <?php endforeach; ?>
</div>