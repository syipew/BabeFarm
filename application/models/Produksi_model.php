<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model {

    public function get_all()
{
    $this->db->select('produksi.*, kandang.jenis_ayam');
    $this->db->from('produksi');
    $this->db->join('kandang', 'kandang.id_kandang = produksi.id_kandang');
    return $this->db->get()->result();
}

}