<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Masyarakat (<?= count($user); ?>)</h1>
  </div>
  <?= $this->session->flashdata('pesan'); ?>

  <table class="table table-striped mt-3">
    <tr>
      <th>No</th>
      <th>Nama User</th>
      <th>Username</th>
      <th>No Telepon</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($user as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row->nama_lengkap; ?></td>
        <td><?= $row->username; ?></td>
        <td><?= $row->telp; ?></td>
        <td>
          <a href="<?= base_url('data_user/edit/' . $row->id_user); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          <a href="<?= base_url('data_user/hapus/' . $row->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</div>