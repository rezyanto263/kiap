<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller {

    public function index()
    {
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar-panduan',
            'content' => 'user/panduan',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );

        $this->load->view('master', $partials);
    }

}

/* End of file Panduan.php */

?>