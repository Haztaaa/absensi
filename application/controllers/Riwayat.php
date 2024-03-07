<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Riwayat');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['riwayat'] = $this->Model_Riwayat->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('riwayat/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
