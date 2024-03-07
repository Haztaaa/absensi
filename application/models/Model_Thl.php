<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Thl extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('thl', $data);
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('thl');
        $this->db->order_by('nama');
        $result = $this->db->get()->result_array();

        return $result;
    }
}
