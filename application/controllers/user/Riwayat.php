<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('nik_ibu') == 0) {
            redirect('auth', 'refresh');
        }
        $this->load->model('dashboard/M_riwayat');
    }
    
    public function index()
    {
        $query = [
            'pemeriksaan' => $this->M_riwayat->user_r_pemeriksaan('nik_ibu', $this->session->userdata('nik_ibu')),
            'pertumbuhan' => $this->M_riwayat->user_r_pertumbuhan('nik_ibu', $this->session->userdata('nik_ibu')),
            'vaksin' => $this->M_riwayat->user_r_vaksin('nik_ibu', $this->session->userdata('nik_ibu')),
            'anak' => $this->M_riwayat->cekSatuRiwayat('anak', 'nik_ibu', $this->session->userdata('nik_ibu'))->result_array(),
        ];
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'content' => 'user/riwayat',
            'footer' => 'partials/footer',
            'script' => 'partials/script-riwayat'
        );
        $this->load->vars($query);
        $this->load->view('master', $partials);
    }

}

/* End of file Riwayat.php */

?>