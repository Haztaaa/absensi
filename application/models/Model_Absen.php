<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Absen extends CI_Model
{
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('thl', 'absen.id_thl = thl.id_thl');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function insert($data)
    {
        return $this->db->insert('absen', $data);
    }
    public function update($id_absen, $data)
    {
        $this->db->where('id_absen', $id_absen);
        return $this->db->update('absen', $data);
    }
    public function getEmployeeData($npnp)
    {
        // Sesuaikan dengan nama tabel dan kolom pada database Anda
        $this->db->select('*');
        $this->db->from('thl');
        $this->db->where('npnp', $npnp);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
