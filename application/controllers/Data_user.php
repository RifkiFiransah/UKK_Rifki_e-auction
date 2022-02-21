<?php 
class Data_user extends CI_Controller {
  public function index()
  {
    $data['user'] = $this->M_admin->tampil_user();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/user', $data);
    $this->load->view('layout/footer');
  }
}
