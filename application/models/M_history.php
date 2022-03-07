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

  public function penawaran_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function tampil_id($id)
  {
    // $result = $this->db->order_by('penawaran_harga', 'DESC')
    //   ->where('id_lelang', $id)
    //   ->join('tb_masyarakat', 'tb_masyarakat.id_user=history_lelang.id_user')->get('history_lelang');
    $result = $result = $this->db->query("SELECT * FROM history_lelang INNER JOIN tb_barang ON history_lelang.id_barang = tb_barang.id_barang INNER JOIN tb_lelang ON history_lelang.id_lelang = tb_lelang.id_lelang INNER JOIN tb_masyarakat ON history_lelang.id_user = tb_masyarakat.id_user WHERE tb_lelang.id_lelang=$id");
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return [];
    }
  }

  public function tampil_id_user($id)
  {
    // $result = $this->db->order_by('penawaran_harga', 'DESC')
    //   ->where('id_user', $id)
    //   // ->join('tb_masyarakat', 'tb_masyarakat.id_user=history_lelang.id_user')
    //   ->join('tb_lelang', 'tb_lelang.id_lelang=history_lelang.id_lelang', 'tb_barang', 'tb_barang.id_barang=history_lelang.id_barang')
    //   ->join('tb_barang', 'tb_barang.id_barang=history_lelang.id_barang')
    //   ->get('history_lelang');

    $result = $this->db->query("SELECT * FROM history_lelang INNER JOIN tb_barang ON history_lelang.id_barang = tb_barang.id_barang INNER JOIN tb_lelang ON history_lelang.id_lelang = tb_lelang.id_lelang INNER JOIN tb_masyarakat ON history_lelang.id_user = tb_masyarakat.id_user WHERE tb_masyarakat.id_user=$id");
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return [];
    }
  }

  public function get_harga_tertinggi($id)
  {
    // $this->db->query("SELECT * FROM history_lelang WHERE id_lelang=$id ORDER BY penawaran_harga DESC LIMIT 1");

    $result = $this->db->where('id_lelang', $id)->order_by('penawaran_harga', 'desc')->limit(1)->get('history_lelang');

    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return [];
    }
  }
}
