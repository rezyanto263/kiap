<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function index()
    {
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar-panduan',
            'content' => 'user/profile/index',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );

        $this->load->view('master', $partials);
    }

    public function edit() {
        $partials = array(
            'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'content' => 'user/profile/edit',
            'footer' => 'partials/footer',
            'script' => 'partials/script'
        );

        $this->load->view('master', $partials);
    }

}

/* End of file Profil.php */

?>
