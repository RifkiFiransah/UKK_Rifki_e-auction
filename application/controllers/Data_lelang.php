<?php

class Data_lelang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('username')) {
      redirect(base_url('auth/login_admin'));
    } else if ($this->session->userdata('id_level') == 2) {
      redirect(base_url('dashboard'));
    }
  }

  public function index()
  {
    $data['lelang'] = $this->M_lelang->tampil_data();
    $data['barang'] = $this->M_barang->tampil_belum_lelang();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/data_lelang', $data);
    $this->load->view('layout/footer');
  }

  public function aksi_buka($id)
  {
    $where = ['id_lelang' => $id];
    $data = ['status' => 'dibuka'];
    $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    Status Dibuka
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    $this->db->where($where);
    $this->db->update('tb_lelang', $data);

    redirect(base_url('data_lelang'));
  }

  public function aksi_tutup($id)
  {
    $where = ['id_lelang' => $id];
    $data = ['status' => 'ditutup'];
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Status Ditutup
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    $this->db->where($where);
    $this->db->update('tb_lelang', $data);

    redirect(base_url('data_lelang'));
  }

  public function hapus($id)
  {
    // $where = ['id_lelang' => $id];
    $this->M_lelang->delete_lelang($id, 'tb_lelang');
    // $this->db->query("DELETE FROM tb_lelang WHERE id_lelang=$id")->row();
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Data Berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    redirect(base_url('data_lelang'));
  }

  public function tambah_data()
  {
    $id_barang = $this->input->post('id_barang');
    $status = $this->input->post('status');

    $data = [
      'id_barang' => $id_barang,
      'tgl_lelang' => date('Y-m-d H:i:s'),
      'id_petugas' => $this->session->userdata('id_petugas'),
      'status' => $status
    ];
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');

    $this->M_lelang->input_data($data, 'tb_lelang');
    redirect(base_url('data_lelang'));
  }

  public function edit($id)
  {
    $where = ['id_lelang' => $id];
    $data['lelang'] = $this->M_lelang->tampil_id($where, 'tb_lelang')->result();
    $data['barang'] = $this->M_barang->tampil_data()->result();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/edit_lelang', $data);
    $this->load->view('layout/footer');
  }

  public function update_data()
  {
    $id = $this->input->post('id_lelang');
    $status = $this->input->post('status');
    $where = ['id_lelang' => $id];
    $data = [
      'tgl_lelang' => $this->input->post('tgl_lelang'),
      'status' => $status
    ];
    $this->M_lelang->update_lelang($where, $data, 'tb_lelang');
    if ($status == 'ditutup') {
      $ambil = $this->M_history->get_harga_tertinggi($id);

      if ($ambil) {
        $this->M_penawaran->add_penawaran($id, $ambil->id_user, $ambil->penawaran_harga);
      }
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    Data Berhasil diedit
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    redirect(base_url('data_lelang'));
  }

  public function detail($id)
  {
    $data['lelang'] = $this->M_history->tampil_id($id);

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/detail_lelang', $data);
    $this->load->view('layout/footer');
  }
}
