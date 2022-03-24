<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>
  </div>

  <a href="<?= base_url('data_admin/tambah'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
  <!-- <a class="btn btn-sm btn-warning" href=""><i class="fa fa-print"></i> Cetak PDF</a> -->
  <?= $this->session->flashdata('pesan'); ?>

  <table class="table table-bordered mt-3">
    <tr class="bg-primary text-light">
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Level</th>
      <th class="text-center" width="180px">Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($admin as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row->nama_petugas; ?></td>
        <td><?= $row->username; ?></td>
        <td><?= $row->level; ?></td>
        <td class="text-center">
          <a href="<?= base_url('data_admin/hapus/' . $row->id_petugas); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini');"><i class="fas fa-trash"></i> Hapus</a>
          <a href="<?= base_url('data_admin/edit/' . $row->id_petugas); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>