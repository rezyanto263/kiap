<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hasil extends CI_Model
{

    public function allData()
    {
        return $this->db->get('pemeriksaan');
    }
}

/* End of file M_hasil.php */
