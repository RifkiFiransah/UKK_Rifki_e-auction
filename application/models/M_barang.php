<?php

class M_barang extends CI_Model
{
  public function tampil_data()
  {
    return $this->db->get('tb_barang');
  }

  public function tampil_id($id)
  {
    $result = $this->db->where('id_barang', $id)->get('tb_barang');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }

  public function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function delete_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_barang($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}
