<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat extends CI_Model
{

    public function r_pemeriksaan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pemeriksaan');
        $this->db->join('pemeriksaan', 'pemeriksaan.id_periksa = riwayat_pemeriksaan.id_periksa', 'left');
        $this->db->join('dokter', 'dokter.nip = pemeriksaan.nip_dokter', 'left');
        return $this->db->get()->result_array();
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

    public function cekSatuRiwayat($tabel, $field, $param) {
        return $this->db->get_where($tabel, array($field => $param));
    }

    public function tambahRiwayat($tabel, $arrayData) {
        $this->db->insert($tabel, $arrayData);
    }

    public function r_pertumbuhan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pertumbuhan a');
        $this->db->join('anak b', 'b.nik_anak = a.nik_anak', 'left');
        return $this->db->get()->result_array();
    }

    public function allData($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }
}

/* End of file M_riwayat.php */
