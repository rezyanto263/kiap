<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('dashboard/M_riwayat');
    }


    public function pertumbuhan()
    {

        $result = [
            'r_pertumbuhan' => $this->M_riwayat->r_pertumbuhan(),
            'data_periksa' => $this->M_riwayat->alldata('pemeriksaan'),
            'anak' =>  $this->M_riwayat->alldata('anak'),
        ];
        $data['title'] = 'Riwayat Pertumbuhan Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pertumbuhan', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function add_pertumbuhan()
    {
        $insert = [
            'id_periksa' => $this->input->post('id_periksa'),
            'bb' => $this->input->post('bb'),
            'tb' => $this->input->post('tb'),
            'lk' => $this->input->post('lk'),
            'status_gizi' => $this->input->post('gizi'),
            'catatan' => $this->input->post('catatan'),
            'nik_anak' => $this->input->post('nik_anak'),
        ];

        $this->db->insert('riwayat_pertumbuhan', $insert);
        redirect('dashboard/riwayat/pertumbuhan');
    }

    public function r_vaksin()
    {
        $result = [
            'vaksin' => $this->M_riwayat->r_vaksin(),
            'anak' =>  $this->M_riwayat->alldata('anak'),
            'data_periksa' => $this->M_riwayat->alldata('pemeriksaan'),
            'data_vaksin' => $this->M_riwayat->alldata('vaksin'),
        ];
        $data['title'] = 'Riwayat Vaksin Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/r_vaksin', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function vaksin()
    {
        $result['vaksin'] = $this->db->get('vaksin')->result_array();
        $data['title'] = 'Riwayat Vaksin Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/vaksin', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function pemeriksaan()
    {
        $data = [
            'r_periksa' => $this->M_riwayat->r_pemeriksaan(),
            'data_periksa' => $this->M_riwayat->alldata('pemeriksaan'),
            'ibu' =>  $this->M_riwayat->alldata('ibu'),
            'anak' =>  $this->M_riwayat->alldata('anak'),
        ];
        $title['title'] = 'Riwayat Pemeriksaan Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pemeriksaan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function add_rpemeriksaan()
    {
        $this->M_riwayat->add_rpemeriksaan();
        redirect('dashboard/riwayat/pemeriksaan');
    }

    public function edit_periksa()
    {
        $this->M_riwayat->edit_periksa();
        redirect('dashboard/riwayat/pemeriksaan');
    }

    public function daftar_periksa()
    {

        $result = [
            'periksa' => $this->M_riwayat->r_daftar_periksa(),
            'dokter' =>  $this->M_riwayat->alldata('dokter'),
            'ibu' =>  $this->M_riwayat->alldata('ibu'),
            'petugas' =>  $this->M_riwayat->alldata('petugas'),
            'ruangan' =>  $this->M_riwayat->alldata('ruangan'),
        ];
        $title['title'] = 'Daftar Periksa';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/daftar_periksa', $result);
        $this->load->view('partials/dash_footer.php');
    }

    public function add_daftarPeriksa()
    {
        $insert = [
            "id_periksa" => $this->input->post('id'),
            "tanggal_periksa" => $this->input->post('tgl'),
            "nik_ibu" => $this->input->post('nik_ibu'),
            "id_petugas" => $this->input->post('petugas'),
            "nip_dokter" => $this->input->post('dokter'),
            "id_ruangan" => $this->input->post('id_ruangan'),
        ];
        $this->db->insert('pemeriksaan', $insert);
        redirect('dashboard/riwayat/daftar_periksa');
    }

    public function edit_daftarPeriksa()
    {
        $this->M_riwayat->edit_daftarPeriksa();
        redirect('dashboard/riwayat/daftar_periksa');
    }

    public function delete_daftarPeriksa($id_periksa)
    {
        $this->M_riwayat->delete_daftarPeriksa($id_periksa);
        redirect('dashboard/riwayat/daftar_periksa');
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
