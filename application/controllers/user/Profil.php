<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('nik_ibu') == 0) {
            redirect('auth', 'refresh');
        }
        $this->load->model('user/M_profil');
    }
    
    public function index()
    {
        $ibu = $this->session->userdata('nik_ibu');
        $data['ibu'] = $this->M_profil->tampil($ibu);
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar-panduan',
            'content' => 'user/profile/index',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );
        $this->load->vars($data);
        $this->load->view('master', $partials);
    }

    public function edit() {
        $ibu = $this->session->userdata('nik_ibu');
        $data['ibu'] = $this->M_profil->tampil($ibu);
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'content' => 'user/profile/edit',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );
        $this->load->vars($data);
        $this->load->view('master', $partials);
    }

    public function edit_profil() {
        $this->M_profil->edit();
        $this->session->set_flashdata('pesan', 
        '<div class="alert alert-success" role="alert">
        Data Berhasil Diubah! </div>');
        
        redirect('profil');
    }

}

/* End of file Profil.php */

?>
