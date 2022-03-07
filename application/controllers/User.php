<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('username')) {
      redirect(base_url('auth'));
    } else if ($this->session->userdata('id_level') > 0) {
      redirect(base_url('auth'));
    }
  }
  public function index()
  {
    $data['barang'] = $this->M_lelang->tampil_data_buka();
    $this->load->view('user/home', $data);
    $this->load->view('user/footer');
  }

  public function detail($id)
  {
    // $where = ['id_barang' => $id];
    $data['barang'] = $this->M_lelang->tampil_detail($id);
    $data['history'] = $this->M_history->tampil_id($id);

    $this->load->view('user/detail', $data);
    $this->load->view('user/footer');
  }

  public function history($id)
  {
    $data['history'] = $this->M_history->tampil_id_user($id);
    $this->load->view('user/history', $data);
    $this->load->view('user/footer');
  }

  public function tawar($id)
  {

    $data['barang'] = $this->M_lelang->tampil_detail($id);
    $this->load->view('user/penawaran', $data);
    $this->load->view('user/footer');
  }


  public function profile($id)
  {
    $where = ['id_user' => $id];
    $data['user'] = $this->M_auth->tampil_id($where)->result();

    $this->load->view('user/profile', $data);
    $this->load->view('user/footer');
  }

  public function penawaran()
  {
    if ($this->input->post('penawaran') > $this->input->post('harga_awal')) {
      $id_user = $this->input->post('id_user');
      $id_barang = $this->input->post('id_barang');
      $id_lelang = $this->input->post('id_lelang');
      $penawaran = $this->input->post('penawaran');

      $data = [
        'id_lelang' => $id_lelang,
        'id_barang' => $id_barang,
        'id_user' => $id_user,
        'penawaran_harga' => $penawaran
      ];
      $this->M_history->penawaran_data($data, 'history_lelang');

      $this->session->set_flashdata('pesan', "<script>alert('Penawaran Berhasil di ajukan')</script>");
    } else {
      $this->session->set_flashdata('pesan', "<script>alert('Penawaran Gagal di ajukan')</script>");
    }
    redirect(base_url('user'));
  }
}
