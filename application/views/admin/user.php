<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Masyarakat</h1>
  </div>

  <table class="table table-striped mt-3">
    <tr>
      <th>No</th>
      <th>Nama User</th>
      <th>Username</th>
      <th>No Telepon</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($user as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row->nama_lengkap; ?></td>
        <td><?= $row->username; ?></td>
        <td><?= $row->telp; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

</div>