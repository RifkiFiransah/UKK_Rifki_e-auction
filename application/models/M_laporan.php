<?php

class M_laporan extends CI_Model
{
  public function get_data()
  {
    $result = $this->db->query("SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang INNER JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas WHERE harga_akhir IS NOT NULL AND tb_lelang.id_user IS NOT NULL AND status='ditutup'");

    if ($result) {
      return $result->result();
    } else {
      return [];
    }
  }
}
