<?php

class Data_barang extends CI_Controller
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
    $data['barang'] = $this->M_barang->tampil_data()->result();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/data_barang', $data);
    $this->load->view('layout/footer');
  }

  public function tambah_data()
  {
    date_default_timezone_set('Asia/Jakarta');
    $nama_barang = $this->input->post('nama_barang');
    // $tgl = $this->input->post('tgl');
    $harga_awal = $this->input->post('harga_awal');
    $deskripsi_barang = $this->input->post('deskripsi_barang');
    $gambar = $_FILES['gambar']['name'];

    if ($gambar === '') {
      $gambar = 'images.png';
    } else {
      $config['upload_path'] = './assets/img';
      $config['allowed_types'] = 'jpg|jpeg|png';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        echo 'gagal';
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }

    $data = [
      'nama_barang' => $nama_barang,
      'tgl' => date('Y-m-d H:i:s'),
      'harga_awal' => $harga_awal,
      'deskripsi_barang' => $deskripsi_barang,
      'gambar'  => $gambar
    ];

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    $this->M_barang->input_data($data, 'tb_barang');
    redirect(base_url('data_barang'));
  }

  public function hapus($id)
  {
    $where = ['id_barang' => $id];
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    $this->M_barang->delete_data($where, 'tb_barang');

    redirect(base_url('data_barang'));
  }

  public function edit($id)
  {
    $where = ['id_barang' => $id];
    $data['barang'] = $this->M_barang->edit_data($where, 'tb_barang')->result();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/edit_barang', $data);
    $this->load->view('layout/footer');
  }

  public function update_data()
  {
    $id_barang = $this->input->post('id_barang');
    $nama_barang = $this->input->post('nama_barang');
    $tgl = $this->input->post('tgl');
    $harga_awal = $this->input->post('harga_awal');
    $deskripsi_barang = $this->input->post('deskripsi_barang');
    $gambar_lama = $this->input->post('gambarLama');
    $gambar = $_FILES['gambar']['name'];

    if ($gambar === '') {
      $gambar = $this->input->post('gambarLama');
    } else {
      $config['upload_path'] = './assets/img';
      $config['allowed_types'] = 'jpg|jpeg|png';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        echo 'gagal';
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }

    $where = ['id_barang' => $id_barang];
    $data = [
      'nama_barang' => $nama_barang,
      'tgl' => $tgl,
      'harga_awal' => $harga_awal,
      'deskripsi_barang' => $deskripsi_barang,
      'gambar' => $gambar,
    ];

    $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    Data Berhasil diedit
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    $this->M_barang->update_barang($where, $data, 'tb_barang');
    redirect(base_url('data_barang'));
  }

  public function print_barang()
  {
    $data['barang'] = $this->M_barang->tampil_data()->result();

    $this->load->view('print/print_barang', $data);
  }
}
