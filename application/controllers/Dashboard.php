<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Model_Dashboard'); // Gantilah User_model dengan nama model yang sesuai
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();



        $data['all'] = $this->db->get('thl')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pengaturan()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        if ($this->session->userdata('level') == 2) {
            $data['var'] = $this->db->get_where('leader_kecamatan', ['id_user' =>
            $this->session->userdata('id_user')])->row_array();
        }
        if ($this->session->userdata('level') == 3) {
            $data['var'] = $this->db->get_where('leader_kelurahan', ['id_user' =>
            $this->session->userdata('id_user')])->row_array();
        }
        if ($this->session->userdata('level') == 4) {
            $data['var'] = $this->db->get_where('leader_tps', ['id_user' =>
            $this->session->userdata('id_user')])->row_array();
        }
        $id_user = $this->input->post('id_user');
        $level = $this->session->userdata('level');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($level != 1) {
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
            $this->form_validation->set_rules('no_tps', 'No TPS', 'required');
            $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/pengaturan', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $level = $this->session->userdata('level');
            $id_user = $this->session->userdata('id_user'); // Ambil id_user dari sesi

            $data_user = array(
                'nama' => $this->input->post('nama')
            );

            if ($level != 1) {
                $data = array(
                    'kecamatan' => $this->input->post('kecamatan'),
                    'kelurahan' => $this->input->post('kelurahan'),
                    'no_tps' => $this->input->post('no_tps'),
                    'no_hp' => $this->input->post('no_hp')
                );
                if ($level == 2) {
                    $this->Model_Dashboard->update_leader_kecamatan($id_user, $data);
                    $this->Model_Dashboard->update_user($id_user, $data_user);
                } elseif ($level == 3) {
                    $this->Model_Dashboard->update_leader_kelurahan($id_user, $data);
                    $this->Model_Dashboard->update_user($id_user, $data_user);
                } elseif ($level == 4) {
                    $this->Model_Dashboard->update_leader_tps($id_user, $data);
                    $this->Model_Dashboard->update_user($id_user, $data_user);
                }
            } else {
                $this->Model_Dashboard->update_user($id_user, $data_user);
            }


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Mengubah Data Diri!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('dashboard');
        }
    }
    public function username()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('username_lama', 'Username Lama', 'required|callback_check_username_lama');
        $this->form_validation->set_rules('username_baru', 'Username Baru', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('konfirmasi_username', 'Konfirmasi Username Baru', 'required|matches[username_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/username', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $username_lama = $this->input->post('username_lama');
            $username_baru = $this->input->post('username_baru');

            // Periksa apakah username lama sesuai dengan yang ada di database
            $user = $this->Model_Dashboard->get_user_by_id_and_username($id_user, $username_lama);
            if ($user) {
                // Jika username lama sesuai, simpan username baru ke database
                $data = array(
                    'username' => $username_baru
                );
                $this->Model_Dashboard->update_user($id_user, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Berhasil Mengubah Username!
                       <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </a>
                   </div>');
                redirect('dashboard');
            } else {
                // Tampilkan pesan kesalahan jika username lama tidak sesuai
                $this->load->view('form_view', array('username_lama_error' => 'Username lama tidak sesuai dengan yang ada di database.'));
            }
        }
    }
    public function check_username_lama($username_lama)
    {
        $id_user = $this->input->post('id_user');
        $user = $this->Model_Dashboard->get_user_by_id_and_username($id_user, $username_lama);
        if ($user) {
            return true; // Username lama sesuai
        } else {
            $this->form_validation->set_message('check_username_lama', 'Username lama tidak sesuai!');
            return false; // Username lama tidak sesuai
        }
    }
    public function password()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/password', $data);
            $this->load->view('templates/footer', $data);
        } else {


            // Periksa apakah username lama sesuai dengan yang ada di database
            $id_user = $this->input->post('id_user');
            $password_baru = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);

            // Update password baru dalam database
            $data = array(
                'password' => $password_baru
            );
            $this->Model_Dashboard->update_user($id_user, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Mengubah Password!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('dashboard');
        }
    }
}
