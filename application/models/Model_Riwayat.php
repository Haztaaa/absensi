<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Riwayat extends CI_Model
{
    public function get_all()
    {
        date_default_timezone_set('Asia/Makassar');
        $tgl = date('Y-m-d');

        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('thl', 'absen.id_thl = thl.id_thl');
        $this->db->where('tanggal', $tgl);
        $result = $this->db->get()->result_array();
        return $result;
    }
}
