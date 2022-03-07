<?php

class Data_admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('id_level')) {
      redirect(base_url('auth/login_admin'));
    } else if ($this->session->userdata('id_level') == 1) {
      redirect(base_url('dashboard'));
    }
  }

  public function index()
  {
    $data['admin'] = $this->M_admin->tampil_data();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/data_admin', $data);
    $this->load->view('layout/footer');
  }

  public function tambah()
  {
    $data['admin'] = $this->M_admin->status()->result();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/tambah_admin', $data);
    $this->load->view('layout/footer');
  }

  public function input_data()
  {
    $this->form_validation->set_rules('nama_petugas', 'Nama Lengkap', 'required', ['required' => 'Nama Harus Diisi']);
    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
    $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]', ['required' => 'Password wajib diisi', 'matches' => 'Password Tidak sama']);
    $this->form_validation->set_rules('password_confirm', 'Password', 'required|matches[password]', ['required' => 'Password wajib diisi', 'matches' => 'Password Tidak sama']);

    if ($this->form_validation->run() == false) {
      $data['admin'] = $this->M_admin->status()->result();

      $this->load->view('layout/header');
      $this->load->view('layout/sidebar');
      $this->load->view('admin/tambah_admin', $data);
      $this->load->view('layout/footer');
    } else {
      $data = [
        'nama_petugas' => $this->input->post('nama_petugas'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'id_level'  => $this->input->post('id_level')
      ];
      $this->db->insert('tb_petugas', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      Registrasi Berhasil
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');

      redirect(base_url('data_admin'));
    }
  }

  public function hapus($id)
  {
    $where = ['id_petugas' => $id];

    $this->db->where($where);
    $this->db->delete('tb_petugas');

    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
      Data Berhasil Dihapus
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect(base_url('data_admin'));
  }

  public function edit($id)
  {
    $where = ['id_petugas' => $id];
    $data['admin'] = $this->M_admin->tampil_admin($where);

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/edit_admin', $data);
    $this->load->view('layout/footer');
  }

  public function edit_data()
  {
    $this->form_validation->set_rules('password', 'Password', 'matches[password_confirm]', ['matches' => 'Password Tidak sama']);
    $this->form_validation->set_rules('password_confirm', 'Password', 'matches[password]', ['matches' => 'Password Tidak sama']);

    if ($this->form_validation->run() == false) {
      $where = ['id_petugas' => $this->input->post('id_petugas')];
      $data['admin'] = $this->M_admin->tampil_admin($where);

      $this->load->view('layout/header');
      $this->load->view('layout/sidebar');
      $this->load->view('admin/edit_admin', $data);
      $this->load->view('layout/footer');
    } else {
      $namaPetugas = $this->input->post('nama_petugas');
      $username = $this->input->post('username');
      $idLevel = $this->input->post('id_level');
      if ($this->input->post('password') == null) {
        $password = $this->input->post('password_lama');
      } else {
        $password = md5($this->input->post('password'));
      }
      $where = ['id_petugas' => $this->input->post('id_petugas')];
      $data = [
        'nama_petugas' => $namaPetugas,
        'username' => $username,
        'id_level' => $idLevel,
        'password' => $password
      ];

      $this->M_admin->update_data($data, $where, 'tb_petugas');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      Edit Berhasil
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');

      redirect(base_url('data_admin'));
    }
  }
}
