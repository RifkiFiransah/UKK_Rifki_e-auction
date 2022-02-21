<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('username')) {
      redirect(base_url('auth'));
    }
  }
  public function index()
  {
    $data['barang'] = $this->M_barang->tampil_data()->result();
    $this->load->view('user/home', $data);
    $this->load->view('user/footer');
  }

  public function detail($id)
  {
    // $where = ['id_barang' => $id];
    $data['barang'] = $this->M_barang->tampil_id($id);
    $this->load->view('user/detail', $data);
    $this->load->view('user/footer');
  }

  public function history()
  {
    $data['history'] = $this->M_history->tampil_data();
    $this->load->view('user/history', $data);
    $this->load->view('user/footer');
  }

  public function tawar($id)
  {
    $data['barang'] = $this->M_barang->tampil_id($id);
    $this->load->view('user/penawaran', $data);
    $this->load->view('user/footer');
  }
}
