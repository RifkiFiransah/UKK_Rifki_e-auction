<?php

class M_lelang extends CI_Model
{
  public function tampil_data()
  {
    return $this->db->query("SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang LEFT JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas")->result();

    // return $this->db->from('tb_lelang')
    //   ->join('tb_barang', 'tb_barang.id_barang=tb_lelang.id_barang')
    //   ->join('tb_masyarakat', 'tb_masyarakat.id_user=tb_lelang.id_user')
    //   ->join('tb_petugas', 'tb_petugas.id_petugas=tb_lelang.id_petugas')
    //   ->get()->result();
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

  public function tampil_detail($id)
  {
    $result = $this->db->where('id_lelang', $id)->join('tb_barang', 'tb_barang.id_barang=tb_lelang.id_barang')->get('tb_lelang');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }

  public function tampil_data_buka()
  {
    $result = $this->db->where('status', 'dibuka')->join('tb_barang', 'tb_barang.id_barang=tb_lelang.id_barang')->get('tb_lelang');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return [];
    }
  }

  public function delete_lelang($id, $table)
  {
    // $this->db->from($table);
    // $this->db->join('history_lelang', 'history_lelang.id_lelang=tb_lelang.id_lelang');
    // $this->db->where('id_lelang', $id);
    // $this->db->delete($table);
    $this->db->where('id_lelang', $id);
    $this->db->delete($table);
  }
}
