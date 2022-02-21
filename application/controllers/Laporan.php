<?php 

class Laporan extends CI_Controller {
  public function index()
  {
    $data['history'] = $this->M_history->tampil_data();
    $this->load->view('admin/laporan', $data);
  }
}
