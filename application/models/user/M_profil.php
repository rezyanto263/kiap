<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

    public function tampil($ibu) {
        $query = $this->db->get_where('ibu', array('nik_ibu' => $ibu));
        $row = $query->row_array();
        return $row;
    }

    public function edit() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $update = array(
            'nik_ibu' => $this->input->post('nik_ibu'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_suami' => $this->input->post('nama_suami'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pendidikan' => $this->input->post('pendidikan'),
            'gol_darah' => $this->input->post('gol_darah'),
            'no_telp' => $this->input->post('no_telp'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->db->where('nik_ibu', $this->input->post('nik_ibu'));
        $this->db->update('ibu', $update);
    }

}

/* End of file M_profil.php */

?>