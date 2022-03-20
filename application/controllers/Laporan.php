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
    $data['history'] = $this->M_laporan->get_data();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/history', $data);
    $this->load->view('layout/footer');
  }

  public function laporan()
  {
    $data['history'] = $this->M_laporan->get_data();
    $this->load->view('admin/laporan', $data);
  }
}
