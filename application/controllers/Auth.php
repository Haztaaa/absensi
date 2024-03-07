<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->login();
        }
    }
    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // Gunakan password_verify() untuk memeriksa apakah kata sandi cocok
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 1) {
                    redirect('dashboard');
                } else {
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Nama Pengguna Atau Password Salah!
                   <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </a>
               </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     Nama Pengguna Atau Password Salah!
            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </a>
        </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Keluar Aplikasi Berhasil!
            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </a>
        </div>');
        redirect('auth');
    }
}
