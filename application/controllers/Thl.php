<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class Thl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Thl');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['thl'] = $this->Model_Thl->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('thl/index');
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        if ($this->session->userdata('level') != '1') {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('npnp', 'NPnP', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('thl/tambah');
            $this->load->view('templates/footer', $data);
        } else {


            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $npnp = $this->input->post('npnp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $qrCode = new Endroid\QrCode\QrCode($npnp);
            $namaFileQRCode = 'uploads/qrcode/' . $npnp . '.png';
            $qrCode->writeFile($namaFileQRCode);

            $data = [

                'nama' => $nama,
                'jabatan' => $jabatan,
                'npnp' => $npnp,
                'jenis_kelamin' => $jenis_kelamin,
                'qr_code' => $namaFileQRCode,
            ];
            $this->Model_Thl->insert($data);


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Tambah Data Thl Berhasil!
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>');
            redirect('thl');
        }
    }
    public function ubah($id)
    {
        if ($this->session->userdata('level') != '1') {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['val'] = $this->db->query("SELECT * FROM thl WHERE id_thl = '$id'")->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('npnp', 'NPnP', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('thl/ubah');
            $this->load->view('templates/footer', $data);
        } else {


            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $npnp = $this->input->post('npnp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $data = [
                'nama' => $nama,
                'jabatan' => $jabatan,
                'npnp' => $npnp,
                'jenis_kelamin' => $jenis_kelamin,
            ];
            $this->db->where('id_thl', $id);
            $this->db->update('thl', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Ubah Data Thl Berhasil!
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>');
            redirect('thl');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_thl', $id);
        $this->db->delete('thl');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data  thl berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        redirect('thl');
    }
    public function get($id)
    {
        $data = $this->db->get_where('thl', ['id_thl' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
