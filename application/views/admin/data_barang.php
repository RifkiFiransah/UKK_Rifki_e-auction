<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang (<?= count($barang); ?>)</h1>
  </div>

  <?= $this->session->flashdata('pesan'); ?>
  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah-barang"><i class="fa fa-plus"></i> Tambah Data</button>

  <table class="table table-bordered mt-3">
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Tanggal</th>
      <th>Harga Awal</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th colspan="2">Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($barang as $brng) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $brng->nama_barang; ?></td>
        <td><?= $brng->tgl; ?></td>
        <td>Rp. <?= number_format($brng->harga_awal, 0, ',', '.'); ?></td>
        <td><?= $brng->deskripsi_barang; ?></td>
        <td><img src="<?= base_url('assets/img/' . $brng->gambar); ?>" width="50"></td>
        <td>
          <a href="<?= base_url(); ?>data_barang/edit/<?= $brng->id_barang; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
        </td>
        <td>
          <a href="<?= base_url(); ?>data_barang/hapus/<?= $brng->id_barang; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</div>


<div class="modal fade" id="tambah-barang" tabindex="-1" role="dialog" aria-labelledby="modalTambahUbah" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahUbah">Input Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('data_barang/tambah_data'); ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label for="namaBrng">Nama Barang</label>
            <input type="text" class="form-control" id="namaBrng" name="nama_barang" required>
          </div>
          <!-- <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tgl" required>
          </div> -->
          <div class="form-group">
            <label for="harga_awal">Harga Awal</label>
            <input type="number" class="form-control" id="harga_awal" name="harga_awal" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi_barang" required>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambahkan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>