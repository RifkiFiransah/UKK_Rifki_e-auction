<?php

class M_user extends CI_Model
{
  public function tampil_id($id)
  {
    return $this->db->get_where('tb_masyarakat', $id)->result();
  }

  public function update($data, $where, $table)
  {
    $this->db->where('id_user', $where);
    $this->db->update($table, $data);
  }
}
