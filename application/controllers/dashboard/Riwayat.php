<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('dashboard/M_riwayat');
        $this->load->model('dashboard/M_hasil');
    }


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
        $data['periksa'] = $this->M_hasil->alldata();
        $title['title'] = 'Riwayat Pemeriksaan Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pemeriksaan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function daftar_periksa()
    {

        $result['periksa'] = $this->M_riwayat->r_daftar_periksa();
        $title['title'] = 'Hasil Pemeriksaan Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/daftar_periksa', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function tambah_hasil()
    {
        $insert = [
            "id_periksa" => $this->input->post('id_periksa'),
            "keterangan" => $this->input->post('keterangan'),
            "resep" => $this->input->post('keterangan')
        ];
        $this->db->insert('riwayat_pemeriksaan', $insert);
        redirect('pemeriksaan');
    }
}

/* End of file Riwayat.php */
