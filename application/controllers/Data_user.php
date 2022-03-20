<?php
class Data_user extends CI_Controller
{
  public function index()
  {
    $data['user'] = $this->M_admin->tampil_user();

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/user', $data);
    $this->load->view('layout/footer');
  }

  public function hapus($id)
  {
    $this->db->query("DELETE FROM tb_masyarakat WHERE id_user=$id");
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Data Berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');

    redirect(base_url('data_user'));
  }

  public function edit($id)
  {
    $where = [
      'id_user' => $id
    ];
    $data['user'] = $this->M_user->tampil_id($where);
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('admin/edit_user', $data);
    $this->load->view('layout/footer');
  }

  public function update_data()
  {
    $where = $this->input->post('id_user');
    $nama_lengkap = $this->input->post('nama_lengkap');
    $username = $this->input->post('username');
    $password_lama = $this->input->post('password_lama');
    $telp = $this->input->post('telp');

    if ($this->input->post('password') == null) {
      $password = $password_lama;
    } else {
      $password = md5($this->input->post('password'));
    }
    $data = [
      'nama_lengkap' => $nama_lengkap,
      'username' => $username,
      'password' => $password,
      'telp' => $telp
    ];
    $this->M_user->update($data, $where, 'tb_masyarakat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      Edit Berhasil
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');

    redirect(base_url('data_user'));
  }

  public function print_user()
  {
    $data['user'] = $this->M_admin->tampil_user();

    $this->load->view('print/print_user', $data);
  }
}
