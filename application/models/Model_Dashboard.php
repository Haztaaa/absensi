<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Dashboard extends CI_Model
{
    public function update_user($id_user, $data)
    {

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data); // Gantilah 'users' dengan nama tabel yang sesuai
    }
    public function update_leader_kecamatan($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('leader_kecamatan', $data);
    }

    public function update_leader_kelurahan($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('leader_kelurahan', $data);
    }

    public function update_leader_tps($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('leader_tps', $data);
    }
    public function get_user_by_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user'); // Gantilah 'users' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data pengguna sebagai array
        } else {
            return false; // Mengembalikan false jika ID pengguna tidak ditemukan
        }
    }
    public function get_user_by_id_and_username($id_user, $username_lama)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('username', $username_lama);
        $query = $this->db->get('user'); // Gantilah 'users' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data pengguna jika ditemukan
        } else {
            return false; // Mengembalikan false jika tidak ditemukan
        }
    }
}
