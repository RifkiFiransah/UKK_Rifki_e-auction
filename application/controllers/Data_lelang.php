<?php

class Data_lelang extends CI_Controller
{
  public function index()
  {
    $data['lelang'] = $this->M_lelang->tampil_data();
    $data['barang'] = $this->M_barang->tampil_data()->result();

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

  public function proses($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $where = ['id_lelang' => $id];
    $data = $this->M_barang->edit_data($where, 'tb_lelang');
    $penawaran = $this->input->post('penawaran');

    $where = [
      'id_barang' => $id,
      'id_lelang' => $id,
      // 'tgl_lelang' => date('Y-m-d H:i:s'),
      'id_user' => 1,
      'penawaran_harga' => $penawaran,
    ];

    $this->db->insert('history_lelang', $where);
    redirect(base_url('data_lelang'));
  }

  public function penawaran()
  {
    $nama_barang = $this->input->post('nama_barang');
    $id_barang = $this->input->post('id_barang');
    $id_user = $this->input->post('id_user');
    $tawaran = $this->input->post('tawaran');

    $data = [
      'id_barang' => $id_barang,
      'id_user' => $id_user,
      'id_petugas' => 1,
      'harga_akhir' => $tawaran,
      'tgl_lelang' => date('Y-m-d H:m:s'),
      'status' => 'dibuka'
    ];

    $this->db->insert('tb_lelang', $data);
    redirect(base_url());
  }

  public function hapus($id)
  {
    $where = ['id_lelang' => $id];
    $this->db->where($where)->delete('tb_lelang');
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
    $harga_akhir = $this->input->post('harga_akhir');
    $status = $this->input->post('status');

    $data = [
      'id_barang' => $id_barang,
      'tgl_lelang' => date('Y-m-d H:i:s'),
      'harga_akhir' => $harga_akhir,
      'id_user' => 1,
      'id_petugas' => 1,
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
    $where = ['id_lelang' => $id];
    $data = [
      'id_barang' => $this->input->post('id_barang'),
      'tgl_lelang' => $this->input->post('tgl_lelang'),
      'harga_akhir' => $this->input->post('harga_akhir'),
      'status' => $this->input->post('status')
    ];
    $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    Data Berhasil diedit
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    $this->M_lelang->update_lelang($where, $data, 'tb_lelang');
    redirect(base_url('data_lelang'));
  }
}
