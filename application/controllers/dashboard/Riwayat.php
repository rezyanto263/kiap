<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('dashboard/M_riwayat');
    }

    // View
    public function pertumbuhan()
    {
        $result['pertumbuhan'] = $this->M_riwayat->r_pertumbuhan();
        $data['title'] = 'Riwayat Pertumbuhan Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pertumbuhan', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function vaksin()
    {
        $result['vaksin'] = $this->db->get('riwayat_vaksin')->result_array();
        $data['title'] = 'Riwayat Vaksin Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/vaksin', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function pemeriksaan()
    {
        $data['pemeriksaan'] = $this->M_riwayat->r_pemeriksaan();
        $data['periksa'] = $this->M_riwayat->alldata('riwayat_pemeriksaan');
        $title['title'] = 'Riwayat Pemeriksaan Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pemeriksaan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function daftar_periksa()
    {
        $result = [
            'dataPeriksa' => $this->M_riwayat->r_daftar_periksa(),
            'dataDokter' => $this->M_riwayat->allData('dokter'),
            'dataRuangan' => $this->M_riwayat->allData('ruangan'),
            'dataIbu' => $this->M_riwayat->allData('ibu')
        ];
        $title['title'] = 'Riwayat Daftar Periksa Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/daftar_periksa', $result);
        $this->load->view('partials/dash_footer.php');
    }

    // Proses
    public function tambah_daftar_periksa() {
        $data = array(
            'tanggal_periksa' => date('Y-m-d'),
            'kategori' => $this->input->post('kategori'),
            'nik_ibu' => $this->input->post('nik_ibu'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_petugas' => $this->input->post('nama_petugas'),
            'nama_dokter' => $this->input->post('nama_dokter'),
            'nama_ruangan' => $this->input->post('nama_ruangan')
        );

        $tabel = $this->M_riwayat->r_data_periksa();
        $this->M_riwayat->tambahRiwayat($tabel, $data);

        redirect('daftar_periksa');
    }
}

/* End of file Riwayat.php */
