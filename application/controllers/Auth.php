<?php

class Auth extends CI_Controller
{
  public function index()
  {
    $this->load->view('user/login');
  }

  public function login()
  {
    $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username Wajib diisi']);
    $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password Harus diisi']);
    if ($this->form_validation->run() == false) {
      $this->load->view('user/login');
    } else {
      $auth = $this->M_auth->cek_login();
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
        $this->session->set_userdata('id_user', $auth->id_user);

        redirect(base_url('user'));
        // switch ($auth->role_id) {
        //   case 1:
        //     redirect('admin/Dash_admin');
        //     break;
        //   case 2:
        //     redirect('welcome');
        //     break;
        // }
      }
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
    $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi']);
    $this->form_validation->set_rules('password_confirm', 'password_confirm', 'required', ['required' => 'konfirmasi wajib diisi']);


    if ($this->form_validation->run() == false) {
      $this->load->view('user/registrasi');
    } else {
      $data = [
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
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
      $this->load->model('M_auth');
      $auth = $this->M_auth->cek_login_a();
      if ($auth == false) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Username atau password salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('auth/login_admin');
      } else {
        $this->session->set_userdata('username', $auth->username);
        $this->session->set_userdata('id_level', $auth->id_level);

        switch ($auth->id_level) {
          case 1:
            redirect(base_url('dashboard'));
            break;
          case 2:
            redirect(base_url('dashboard'));
            break;
          default:
            redirect(base_url('auth/login_admin'));
            break;
        }
      }
    }
  }
}
