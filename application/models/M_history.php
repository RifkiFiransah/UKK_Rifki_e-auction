<?php

class M_history extends CI_Model
{
  public function tampil_data()
  {
    return $this->db->from('history_lelang')
      ->join('tb_lelang', 'tb_lelang.id_lelang=history_lelang.id_lelang')
      ->join('tb_barang', 'tb_barang.id_barang=history_lelang.id_barang')
      ->join('tb_masyarakat', 'tb_masyarakat.id_user=history_lelang.id_user')
      ->get()->result();
  }
}
