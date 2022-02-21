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
}
