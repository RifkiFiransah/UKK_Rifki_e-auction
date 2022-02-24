<?php

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('id_level')) {
      redirect(base_url('auth/login_admin'));
    }
  }
  public function index()
  {
    $data['history'] = $this->M_history->tampil_data();
    $this->load->view('admin/laporan', $data);
  }
}
