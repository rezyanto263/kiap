<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_antrian extends CI_Model {

    
    public function getAntrian() {
        $this->db->select('*');
        $this->db->from('antrian_berjalan a');
        $this->db->join('pemeriksaan b', 'b.id_periksa = a.id_periksa', 'left');
        return $this->db->get()->result_array();
    }

    public function tambah() {
        
    }
    

}

/* End of file M_antrian.php */

?>