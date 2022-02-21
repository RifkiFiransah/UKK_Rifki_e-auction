<?php

class Dashboard extends CI_Controller
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
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/dashboard');
    $this->load->view('layout/footer');
  }
}
