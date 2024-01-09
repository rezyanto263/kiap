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
    }
    
    public function index()
    {
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'content' => 'user/riwayat',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );

        $this->load->view('master', $partials);
    }

}

/* End of file Riwayat.php */

?>