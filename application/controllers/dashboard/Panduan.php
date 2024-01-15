<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard/M_panduan');
    }


    public function panduan()
    {
        $data = [
            'title' => 'Panduan',
            'getPanduan' => $this->M_panduan->getPanduan(),
        ];
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/panduan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function panduan_ibu()
    {
        $data = [
            'title' => 'Panduan Ibu',
            'getPanduan' => $this->M_panduan->getPanduanByKategori('ibu'),
            'setKategori' => 'ibu'
        ];
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/panduan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function panduan_balita()
    {
        $data = [
            'title' => 'Panduan Balita',
            'getPanduan' => $this->M_panduan->getPanduanByKategori('balita'),
            'setKategori' => 'balita'
        ];
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/panduan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function panduan_anak()
    {
        $data = [
            'title' => 'Panduan Anak',
            'getPanduan' => $this->M_panduan->getPanduanByKategori('anak'),
            'setKategori' => 'anak'
        ];
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/panduan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function panduan_remaja()
    {
        $data = [
            'title' => 'Panduan Remaja',
            'getPanduan' => $this->M_panduan->getPanduanByKategori('remaja'),
            'setKategori' => 'remaja'
        ];
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/panduan', $data);
        $this->load->view('partials/dash_footer.php');
    }

    public function add_panduan()
    {
        $this->M_panduan->add_panduan();
    }

    public function edit_panduan()
    {
        $this->M_panduan->edit_panduan();
    }
}

/* End of file Panduan.php */
