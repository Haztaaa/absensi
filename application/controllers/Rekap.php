<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('Model_Riwayat');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        // Mengambil data absen dari tabel absen
        $data['absen'] = $this->db->query("SELECT absen.*, thl.* FROM absen JOIN thl ON absen.id_thl = thl.id_thl ")->result_array();
        $bulans = $this->input->post('bulan');
        //  $data['bulandipilih'] = $bulans;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('rekap/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function excel($total_days, $selected_month, $month_name)
    {
        $data['title'] = 'Data Rekap';
        $data['month_name'] = $month_name;
        $data['total_days'] = $total_days;
        $data['selected_month'] = $selected_month;


        $data['absen'] = $this->db->query("SELECT absen.*, thl.* FROM absen JOIN thl ON absen.id_thl = thl.id_thl ")->result_array();


        $this->load->view('rekap/excel', $data);
    }
}
