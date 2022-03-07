<?php

class M_penawaran extends CI_Model
{
  public function add_penawaran($id, $user, $penawaran)
  {
    $this->db->query("UPDATE tb_lelang SET harga_akhir=$penawaran, id_user=$user WHERE tb_lelang.id_lelang=$id");
  }
}
