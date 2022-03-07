<?php

class M_auth extends CI_Model
{
  public function cek_login($username, $password)
  {
    // $username = set_value('username', TRUE);
    // $password = set_value('password', TRUE);

    $result = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('tb_masyarakat');
    return $result->row();
  }

  public function cek_login_a($username, $password)
  {

    // $level  = set_value('level');

    $result = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('tb_petugas');
    // $result = $this->db->where('username', $username)->limit(1)->get('tb_petugas');

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

  public function tampil_data()
  {
    return $this->db->get('tb_masyarakat')->result();
  }

  public function cekUser($username)
  {
    $result = $this->db->where('username', $username)->limit(1)->get('tb_masyarakat');

    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return [];
    }
  }
}
