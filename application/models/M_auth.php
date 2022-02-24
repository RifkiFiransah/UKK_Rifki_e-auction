<?php

class M_auth extends CI_Model
{
  public function cek_login()
  {
    $username = set_value('username');
    $password = set_value('password');

    $result = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('tb_masyarakat');
    return $result->row();
  }

  public function cek_login_a()
  {
    $username = set_value('username');
    $password = set_value('password');
    $level  = set_value('level');

    $result = $this->db->where('username', $username)->where('password', $password)->where('id_level', $level)->limit(1)->get('tb_petugas');

    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return [];
    }
  }

  public function tampil_id($id)
  {
    return $this->db->get_where('tb_masyarakat', $id);
  }
}
