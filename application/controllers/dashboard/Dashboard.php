<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Do your magic here
        if ($this->session->userdata('id_petugas') == 0) {
            redirect('auth', 'refresh');
        }
        $this->load->model('dashboard/M_people');
        $this->load->model('dashboard/M_riwayat');
        $this->load->model('dashboard/M_panduan');
        $this->load->model('dashboard/M_antrian');
    }


    public function index()
    {
        $title['title'] = 'Dashboard';

        $array = [
            'total_ibu' => $this->M_people->count_ibu(),
            'total_anak' => $this->M_people->count_anak(),
            'total_kader' => $this->M_people->count_kader(),
            'total_dokter' => $this->M_people->count_dokter(),
            'total_vaksin' => $this->M_riwayat->count_vaksin(),
            'total_panduan' => $this->M_panduan->count_panduan(),
            'antrian' => $this->M_antrian->getAntrian(),
        ];

        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/dashboard', $array);
        $this->load->view('partials/dash_footer.php');
    }

    public function tambah_antrian() {
        
    }

}

/* End of file Dashboard.php */
