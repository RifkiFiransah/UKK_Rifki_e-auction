<?php

class Auth extends CI_Controller
{
  public function index()
  {
    $this->load->view('user/login');
  }

  public function login()
  {
    $username = $this->input->post('username', TRUE);
    $password = md5($this->input->post('password'));
    $auth = $this->M_auth->cek_login($username, $password);
    if ($auth == false) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Username atau password salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect(base_url('auth'));
    } else {
      $this->session->set_userdata('username', $auth->username);
      $this->session->set_userdata('nama_lengkap', $auth->nama_lengkap);
      $this->session->set_userdata('id_user', $auth->id_user);

      redirect(base_url('user'));
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('user'));
  }

  public function registrasi()
  {
    $this->load->view('user/registrasi');
  }

  public function tambah_user()
  {
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required', ['required' => 'Nama wajib diisi']);
    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
    $this->form_validation->set_rules('telp', 'telp', 'required', ['required' => 'telp wajib diisi']);
    $this->form_validation->set_rules('password', 'password', 'required|matches[password_confirm]', ['required' => 'Password wajib diisi', 'matches' => 'Password Tidak sama']);
    $this->form_validation->set_rules('password_confirm', 'password_confirm', 'required|matches[password]', ['required' => 'konfirmasi wajib diisi', 'matches' => 'Password Tidak sama']);


    if ($this->form_validation->run() == false) {
      $this->load->view('user/registrasi');
    } else {
      $username = $this->input->post('username');
      $cek_user = $this->M_auth->cekUser($username);
      if (!$cek_user) {
        $password = $this->input->post('password');
        $data = [
          'nama_lengkap' => $this->input->post('nama_lengkap'),
          'username' => $username,
          'password' => md5($password),
          'telp'  => $this->input->post('telp')
        ];
        $this->db->insert('tb_masyarakat', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Registrasi Berhasil Silahkan login!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('auth');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Gagal Username Sudah terdaftar!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('auth');
      }
    }
  }

  public function login_admin()
  {
    $this->load->view('layout/header');
    $this->load->view('admin/form_login');
  }

  public function logout_a()
  {
    $this->session->sess_destroy();
    redirect(base_url('auth/login_admin'));
  }

  public function administrator()
  {
    $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username Wajib diisi']);
    $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password Harus diisi']);
    if ($this->form_validation->run() == false) {
      $this->load->view('layout/header');
      $this->load->view('admin/form_login');
    } else {
      $username = $this->input->post('username', true);
      $password = md5($this->input->post('password'));
      $auth = $this->M_auth->cek_login_a($username, $password);
      if ($auth) {
        $this->session->set_userdata('username', $auth->username);
        $this->session->set_userdata('nama_petugas', $auth->nama_petugas);
        $this->session->set_userdata('id_petugas', $auth->id_petugas);
        $this->session->set_userdata('id_level', $auth->id_level);
        redirect(base_url('dashboard'));
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username atau password salah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('auth/login_admin');
        // switch ($auth->id_level) {
        //   case 1:
        //     redirect(base_url('dashboard'));
        //     break;
        //   case 2:
        //     redirect(base_url('dashboard'));
        //     break;
        //   default:
        //     redirect(base_url('auth/login_admin'));
        //     break;
        // }
      }
    }
  }
}
