<?php

class M_lelang extends CI_Model
{
  public function tampil_data()
  {
    return $this->db->from('tb_lelang')
      ->join('tb_barang', 'tb_barang.id_barang=tb_lelang.id_barang')
      ->join('tb_masyarakat', 'tb_masyarakat.id_user=tb_lelang.id_user')
      ->join('tb_petugas', 'tb_petugas.id_petugas=tb_lelang.id_petugas')
      ->get()->result();
  }

  public function input_data($data, $tabel)
  {
    $this->db->insert($tabel, $data);
  }

  public function tampil_id($where, $tabel)
  {
    return $this->db->get_where($tabel, $where);
  }

  public function update_lelang($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}