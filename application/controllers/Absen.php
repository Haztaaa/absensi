<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Absen');
    }
    public function index()
    {
        date_default_timezone_set('Asia/Makassar');
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $current_time = strtotime(date('H:i:s'));

        // Mendefinisikan waktu batas (12:00:00 untuk jam 12 siang)
        $cutoff_time = strtotime('12:00:00');

        // Memeriksa apakah waktu saat ini sudah lewat dari waktu batas
        $is_after_cutoff = ($current_time > $cutoff_time);

        // Mengirimkan data ke view
        $data['is_after_cutoff'] = $is_after_cutoff;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absen/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function shift2()
    {
        date_default_timezone_set('Asia/Makassar');
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $current_time = strtotime(date('H:i:s'));

        // Mendefinisikan waktu batas awal (misalnya, 13:00:00 untuk jam 1 siang)
        $start_time = strtotime('13:00:00');

        // Mendefinisikan waktu batas akhir (misalnya, 17:00:00 untuk jam 5 sore)
        $cutoff_time = strtotime('17:00:00');

        // Memeriksa apakah waktu saat ini berada di antara waktu batas awal dan akhir
        $is_within_time_range = ($current_time >= $start_time && $current_time <= $cutoff_time);

        // Mengirimkan data ke view
        $is_within_time_range = ($current_time >= $start_time && $current_time <= $cutoff_time);
        $data['is_after_cutoff'] = $is_within_time_range;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absen/shift2', $data);
        $this->load->view('templates/footer', $data);
    }
    public function data()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['absen'] = $this->Model_Absen->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absen/data');
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('absen/tambah');
            $this->load->view('templates/footer', $data);
        } else {
            $id_thl = $this->input->post('id_thl');
            $jam = $this->input->post('jam');
            $tanggal = $this->input->post('tanggal');
            $data = [

                'id_thl' => $id_thl,
                'jam1' => $jam,
                'tanggal' => $tanggal,
                'status' => 1,

            ];
            $this->Model_Absen->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Tambah Data Absensi (Shift 1) Berhasil!
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>');
            redirect('absen/data');
        }
    }
    public function tambah_shift2()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('absen/tambah');
            $this->load->view('templates/footer', $data);
        } else {
            $id_thl = $this->input->post('id_thl');
            $jam = $this->input->post('jam');
            $tanggal = $this->input->post('tanggal');
            $q = $this->db->query(" SELECT * FROM absen WHERE id_thl='$id_thl' AND tanggal='$tanggal'")->num_rows();
            if ($q >= 1) {
                $q2 = $this->db->query(" SELECT * FROM absen WHERE id_thl='$id_thl' AND tanggal='$tanggal'")->row_array();
                $id_absen = $q2['id_absen'];
                $data = [
                    'jam2' => $jam,
                ];
                $this->Model_Absen->update($id_absen, $data);
            } else {
                $data = [

                    'id_thl' => $id_thl,
                    'jam2' => $jam,
                    'tanggal' => $tanggal,
                    'status' => 1,

                ];
                $this->Model_Absen->insert($data);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tambah Data Absensi Shift 2 Berhasil!
                       <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </a>
                   </div>');
            redirect('absen/data');
        }
    }
    public function kerja($id_absen)
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['val'] = $this->db->query("SELECT absen.*, thl.* FROM absen JOIN thl ON absen.id_thl = thl.id_thl WHERE absen.id_absen = '$id_absen'")->row_array();



        if ($data['val']['jam1'] == 0 || is_null($data['val']['jam1'])) {
            // Jika nilai jam1 adalah 0 atau null, kirim flag untuk memberikan atribut readonly dan mengganti nilai "Tidak Hadir"
            $data['shift1_value'] = "";
            $data['shift1_readonly'] = true;
        } else if ($data['val']['shift1']) {
            $data['shift1_value'] = $data['val']['shift1'];
            $data['shift1_readonly'] = true;
        } else {
            // Jika nilai jam1 bukan 0 atau null, kirim flag untuk menjalankan form input shift1 normal
            $data['shift1_value'] = $data['val']['jam1'];
            $data['shift1_readonly'] = false;
            $this->form_validation->set_rules('shift1', 'Kerja Shift 1', 'required');
        }
        if ($data['val']['jam2'] == 0 || is_null($data['val']['jam2'])) {
            // Jika nilai jam2 adalah 0 atau null, kirim flag untuk mematikan form input shift2
            $data['disable_shift2'] = true;
        } else {
            // Jika nilai jam2 bukan 0 atau null, kirim flag untuk menjalankan form input shift2 normal
            $data['disable_shift2'] = false;
            $this->form_validation->set_rules('shift2', 'Kerja Shift 2', 'required');
        }
        if ($this->form_validation->run() == false) {


            // Cek apakah nilai jam2 adalah 0 atau null


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('absen/kerja');
            $this->load->view('templates/footer', $data);
        } else {
            $shift1 = $this->input->post('shift1');
            $shift2 = $this->input->post('shift2');

            $data = [
                'shift1' => $shift1,
                'shift2' => $shift2
            ];
            $this->db->where('id_absen', $id_absen);
            $this->db->update('absen', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tambah Data Kerja Berhasil Berhasil!
                       <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </a>
                   </div>');
            redirect('absen/data');
        }
    }
    public function getEmployeeData()
    {
        $npnp = $this->input->post('npnp');

        // Gantilah dengan logika pengambilan data karyawan dari database
        // (Anda perlu membuat model atau menggunakan fungsi database CodeIgniter untuk melakukan ini)
        $employeeData = $this->Model_Absen->getEmployeeData($npnp);

        if ($employeeData) {
            $response = array(
                'success' => true,
                'data' => $employeeData
            );
        } else {
            $response = array(
                'success' => false
            );
        }

        // Kirim respons ke klien
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
