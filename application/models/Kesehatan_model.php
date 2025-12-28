<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan_model extends CI_Model {

    public function get_all()
{
    $this->db->select('kesehatan.*, kandang.jenis_ayam');
    $this->db->from('kesehatan');
    $this->db->join('kandang', 'kandang.id_kandang = kesehatan.id_kandang');
    return $this->db->get()->result();
}

}