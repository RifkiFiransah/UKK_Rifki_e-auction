<?php

class M_admin extends CI_Model
{
  public function tampil_data()
  {
    return $this->db->from('tb_petugas')
      ->join('tb_level', 'tb_level.id_level=tb_petugas.id_level')
      ->get()->result();
  }

  public function status()
  {
    return $this->db->get('tb_level');
  }

  public function tampil_user()
  {
    return $this->db->get('tb_masyarakat')->result();
  }

  public function tampil_admin($id)
  {
    return $this->db->get_where('tb_petugas', $id)->result();
  }

  public function update_data($data, $where, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function cekUsername($username)
  {
    $result = $this->db->where('username', $username)->limit(1)->get('tb_petugas');

    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return [];
    }
  }
}
