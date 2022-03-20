<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Data Laporan</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style type="text/css" media="print">
    @page {
      size: auto;
      /* auto is the initial value */
      margin: 0mm;
      /* this affects the margin in the printer settings */
    }
  </style>
  <style>
    .center {
      margin-right: auto;
      margin-left: auto;
      text-align: center;
    }

    h1 {
      font-size: 16px;
    }

    * {
      font-family: Calibri;
      font-size: 14px;
      -webkit-print-color-adjust: exact;
    }

    .table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      font: normal 13px Arial, sans-serif;
      width: 100%;
    }

    .table thead th {
      background-color: #DDEFEF;
      border: solid 1px #DDEEEE;
      color: #336B6B;
      padding: 10px;
      text-align: left;
      text-shadow: 1px 1px 1px #fff;
    }

    .table tbody td {
      border: solid 1px #DDEEEE;
      color: #333;
      padding: 10px;
      text-shadow: 1px 1px 1px #fff;
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 potrait">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-15mm">
    <h1 class="center" style="font-size: 2em; text-decoration: underline;margin-top: 20px;">LAPORAN ~ BARANG</h1>
    <div class="container-fluid">

      <table class="table table-bordered mt-3">
        <tr class="bg-warning text-light">
          <th>No</th>
          <th>Nama Barang</th>
          <th>Tanggal</th>
          <th>Harga Awal</th>
          <th>Deskripsi</th>
          <th>Gambar</th>
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
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </section>
  <script type="text/javascript">
    window.print();
    window.onafterprint = window.close;
  </script>
</body>

</html>