<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function register_ibu()
    {
        $this->db->trans_start();

        $ibu = [
            'nik_ibu' => htmlspecialchars($this->input->post('nik')),
            'nama_ibu' => htmlspecialchars($this->input->post('nama')),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'agama' => $this->input->post('agama'),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'nama_suami' => htmlspecialchars($this->input->post('nama_suami')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'date_created' => time()

        ];
        $this->db->insert('ibu', $ibu);

        // $last_id = $this->db->insert_id();

        // $daftar = [
        //     'no_daftar' => $last_id,
        //     'nik_ibu' => htmlspecialchars($this->input->post('nik')),
        // ];

        // $this->db->insert('pendaftaran', $daftar);

        $this->db->trans_complete();
    }


    public function cekUser($tabel, $field, $param)
    {
        $query = $this->db->get_where($tabel, array($field => $param));

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

/* End of file M_auth.php */
