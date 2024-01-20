<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('nik_ibu') == 0) {
            redirect('auth', 'refresh');
        }
        $this->load->model('dashboard/M_panduan');
        
    }
    
    public function index()
    {
        $query['panduan'] = $this->M_panduan->getPanduan();
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar-panduan',
            'sidebar' => 'user/sidebar-panduan',
            'content' => 'user/content-panduan',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );
        $this->load->vars($query);
        $this->load->view('panduan-master', $partials);
    }

}

/* End of file Panduan.php */

?>