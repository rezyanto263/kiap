<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat extends CI_Model
{

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
    
    public function r_pemeriksaan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pemeriksaan a');
        $this->db->join('pemeriksaan b', 'b.id_periksa = a.id_periksa', 'left');
        $this->db->join('anak c', 'c.nik_anak = a.nik_anak', 'left');
        $this->db->join('ibu d', 'd.nik_ibu = a.nik_ibu', 'left');
        $this->db->join('ruangan e', 'e.id_ruangan = b.id_ruangan', 'left');
        $this->db->join('dokter f', 'f.nip = b.nip_dokter', 'left');
        return $this->db->get()->result_array();
    }

    public function r_pertumbuhan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pertumbuhan a');
        $this->db->join('pemeriksaan b', 'b.id_periksa = a.id_periksa', 'left');
        $this->db->join('anak c', 'c.nik_anak = a.nik_anak', 'left');
        return $this->db->get()->result_array();
    }

    public function r_vaksin()
    {
        $this->db->select('*');
        $this->db->from('riwayat_vaksin a');
        $this->db->join('pemeriksaan b', 'b.id_periksa = a.id_periksa', 'left');
        $this->db->join('anak c', 'c.nik_anak = a.nik_anak', 'left');
        $this->db->join('vaksin d', 'd.id_vaksin = a.id_vaksin', 'left');
        return $this->db->get()->result_array();
    }

    public function j_vaksin()
    {
        $this->db->select('*');
        $this->db->from('vaksin');
        return $this->db->get()->result_array();
    }

    public function cekSatuRiwayat($tabel, $field, $param) {
        return $this->db->get_where($tabel, array($field => $param));
    }

    public function cekArrayRiwayat($tabel, $arrayData) {
        return $this->db->get_where($tabel, $arrayData);
    }

    public function tambahRiwayat($tabel, $arrayData) {
        $this->db->insert($tabel, $arrayData);
    }

    public function allData($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }

    public function editSatuRiwayat($tabel, $arrayData, $field, $param) {
        $this->db->where($field, $param);
        $this->db->update($tabel, $arrayData);
    }

    public function hapusSatuRiwayat($tabel, $field, $param) {
        $this->db->where($field,$param);
        $this->db->delete($tabel);
        
    }
}

/* End of file M_riwayat.php */
