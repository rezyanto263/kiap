<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat extends CI_Model
{

    public function r_pemeriksaan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pemeriksaan a');
        $this->db->join('pemeriksaan b', 'b.id_periksa = a.id_periksa', 'left');
        $this->db->join('anak c', 'c.nik_anak = a.nik_anak', 'left');
        return $this->db->get()->result_array();
    }

    public function add_rpemeriksaan()
    {
        $insert = [
            'id_periksa' => $this->input->post('id_periksa'),
            'keluhan' => $this->input->post('keluhan'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),
            'pasien' => $this->input->post('pasien'),
            'nik_anak' => $this->input->post('nik_anak'),
            'nik_ibu' => $this->input->post('nik_ibu'),
        ];

        $this->db->insert('riwayat_pemeriksaan', $insert);
    }

    public function edit_periksa()
    {
        $id_periksa = $this->input->post('id_periksa');
        $update = [
            'id_periksa' => $this->input->post('id_periksa'),
            'keluhan' => $this->input->post('keluhan'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),
            'pasien' => $this->input->post('pasien'),
            'nik_anak' => $this->input->post('nik_anak'),
            'nik_ibu' => $this->input->post('nik_ibu'),
        ];
        $this->db->where('id_periksa', $id_periksa);
        $this->db->update('riwayat_pemeriksaan', $update);
    }

    public function r_daftar_periksa()
    {
        $this->db->select('*');
        $this->db->from('pemeriksaan a');
        $this->db->join('dokter b', 'b.nip = a.nip_dokter', 'left');
        $this->db->join('ruangan c', 'c.id_ruangan = a.id_ruangan', 'left');
        $this->db->join('ibu d', 'd.nik_ibu = a.nik_ibu', 'left');
        $this->db->join('petugas e', 'e.id_petugas = a.id_petugas', 'left');
        return $this->db->get()->result_array();
    }

    public function edit_daftarPeriksa()
    {
        $id_periksa = $this->input->post('id');
        $update = [
            "tanggal_periksa" => $this->input->post('tgl'),
            "nik_ibu" => $this->input->post('nik_ibu'),
            "id_petugas" => $this->input->post('petugas'),
            "nip_dokter" => $this->input->post('dokter'),
            "id_ruangan" => $this->input->post('id_ruangan')
        ];
        $this->db->where('id_periksa', $id_periksa);
        $this->db->update('pemeriksaan', $update);
    }

    public function delete_daftarPeriksa($id_periksa)
    {
        $this->db->where('id_periksa', $id_periksa);
        $this->db->delete('pemeriksaan');
    }


    public function r_pertumbuhan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pertumbuhan a');
        $this->db->join('anak b', 'b.nik_anak = a.nik_anak', 'left');
        return $this->db->get()->result_array();
    }

    public function r_vaksin()
    {
        $this->db->select('*');
        $this->db->from('riwayat_vaksin a');
        $this->db->join('vaksin b', 'b.id_vaksin = a.id_vaksin', 'left');
        $this->db->join('anak c', 'c.nik_anak = a.nik_anak', 'left');
        return $this->db->get()->result_array();
    }

    public function allData($tabel)
    {
        return $this->db->get($tabel);
    }
}

/* End of file M_riwayat.php */
