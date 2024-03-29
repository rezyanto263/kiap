<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

    public function tampil($ibu) {
        $query = $this->db->get_where('ibu', array('nik_ibu' => $ibu));
        $row = $query->row_array();
        return $row;
    }

    public function edit() {
        $config['upload_path']          = './image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 100000;
        $config['max_height']           = 100000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
            die;
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
                Data Gagal Dirubah! </div>'
            );

        redirect('profil');
        } else {

        $foto = $this->upload->data();
        $foto = $foto['file_name'];
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $update = array(
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_suami' => $this->input->post('nama_suami'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pendidikan' => $this->input->post('pendidikan'),
            'gol_darah' => $this->input->post('gol_darah'),
            'no_telp' => $this->input->post('no_telp'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'foto' => htmlspecialchars($foto),
            'date_created' => date('Y-m-d H:i:s')
        );
        $this->session->set_userdata(array('foto' => $foto));

        $this->db->where('nik_ibu', $this->input->post('nik_ibu'));
        $this->db->update('ibu', $update);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambah! </div>'
        );
        redirect('profil');
        }
    }

}

/* End of file M_profil.php */

?>