<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data lelang</h1>
  </div>
  <?= $this->session->flashdata('pesan'); ?>
  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lelang-barang"><i class="fa fa-plus"></i> Tambah Data</button>

  <table class="table table-bordered mt-3">
    <tr class="text-center table-warning">
      <th>No</th>
      <!-- <th>Nama Lengkap</th>
      <th>No Telp</th> -->
      <th>Nama Barang</th>
      <th>Tanggal Lelang</th>
      <th>Harga Awal</th>
      <th>Harga Akhir</th>
      <th>Status</th>
      <th>Petugas</th>
      <th>Set Status</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($lelang as $llng) : ?>
      <tr class="text-center">
        <td><?= $i++; ?></td>
        <td><?= $llng->nama_barang; ?></td>
        <td><?= $llng->tgl_lelang; ?></td>
        <td>Rp. <?= number_format($llng->harga_awal, 0, ',', '.'); ?></td>
        <td>Rp. <?= number_format($llng->harga_akhir, 0, ',', '.'); ?></td>
        <?php if ($llng->status == 'dibuka') { ?>
          <td class="text-success mt-1">
            <?= $llng->status; ?>
          </td>
        <?php } else { ?>
          <td class="text-danger mt-1">
            <?= $llng->status; ?>
          </td>
        <?php } ?>
        <td><?= $llng->nama_petugas; ?></td>
        <td>
          <a href="<?= base_url('data_lelang/aksi_buka/' . $llng->id_lelang); ?>" class="btn btn-sm btn-primary">Buka</a>
          <a href="<?= base_url('data_lelang/aksi_tutup/' . $llng->id_lelang); ?>" class="btn btn-sm btn-danger">Tutup</a>
        </td>
        <td>
          <a href="<?= base_url('data_lelang/edit/' . $llng->id_lelang); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
          <a href="<?= base_url('data_lelang/hapus/' . $llng->id_lelang); ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus?');"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>
</div>



<div class="modal fade" id="lelang-barang" tabindex="-1" role="dialog" aria-labelledby="modalLelang" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLelang">Input Data Lelang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('data_lelang/tambah_data'); ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label for="namaBrng">Nama Barang</label>
            <select name="id_barang" id="namaBrng" class="form-control">
              <?php foreach ($barang as $row) : ?>
                <option value="<?= $row->id_barang; ?>"><?= $row->nama_barang; ?> | Harga Awal: <?= $row->harga_awal; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" name="tgl" readonly value="">
          </div> -->
          <div class="form-group">
            <label for="harga_akhir">Harga Akhir</label>
            <input type="number" class="form-control" id="harga_akhir" name="harga_akhir" required>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="dibuka">dibuka</option>
              <option value="ditutup">ditutup</option>
            </select>
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambahkan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>