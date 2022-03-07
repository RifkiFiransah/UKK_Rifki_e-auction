<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Detail Lelang (<?= count($lelang); ?>)</h1>
  </div>
  <?= $this->session->flashdata('pesan'); ?>
  <!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lelang-barang"><i class="fa fa-plus"></i> Tambah Data</button> -->

  <table class="table table-bordered mt-3">
    <tr class="text-center table-warning">
      <th>Id Lelang</th>
      <th>Nama Barang</th>
      <th>Penawar</th>
      <th>Harga Penawaran</th>
    </tr>

    <?php foreach ($lelang as $llng) : ?>
      <tr class="text-center">
        <td><?= $llng->id_lelang; ?></td>
        <td><?= $llng->nama_barang; ?></td>
        <td><?= $llng->nama_lengkap; ?></td>
        <td>Rp. <?= number_format($llng->penawaran_harga, 0, ',', '.'); ?></td>
      </tr>
    <?php endforeach; ?>

  </table>
</div>