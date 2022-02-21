<div class="container-fluid">
  <h1><i class="fas fa-edit"></i> Edit Lelang</h1>

  <form action="<?= base_url('data_lelang/update_data'); ?>" method="POST">
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <select name="id_barang" id="nama_barang" class="form-control">
        <?php foreach ($barang as $brng) : ?>
          <option value="<?= $brng->id_barang; ?>"><?= $brng->nama_barang; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <?php foreach ($lelang as $row) : ?>
      <input type="hidden" name="id_lelang" value="<?= $row->id_lelang; ?>">
      <div class="form-group">
        <label for="tgl_lelang">Tanggal Lelang</label>
        <input type="date" name="tgl_lelang" id="tgl_lelang" value="<?= $row->tgl_lelang; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="harga">Harga Akhir</label>
        <input type="number" name="harga_akhir" id="harga" value="<?= $row->harga_akhir; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
          <option value="dibuka">Dibuka</option>
          <option value="ditutup">Ditutup</option>
        </select>
      </div>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-primary">Edit Data</button>
  </form>
</div>