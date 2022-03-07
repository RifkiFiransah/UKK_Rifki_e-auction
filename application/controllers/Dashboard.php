<?php

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('id_level') && !$this->session->userdata('username') && !$this->session->userdata('password')) {
      redirect(base_url('auth/login_admin'));
    }
  }

  public function index()
  {
    $data['barang'] = $this->M_barang->tampil_data()->result();
    $data['admin'] = $this->M_admin->tampil_data();
    $data['lelang'] = $this->M_lelang->tampil_data();
    $data['user'] = $this->M_auth->tampil_data();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/dashboard', $data);
    $this->load->view('layout/footer');
  }
}
