<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_auth');
        $this->load->library('form_validation');
    }


    public function index()
    {
        if ($this->session->userdata('nik_ibu')) {
            redirect('home');
        }

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required',
            [
                'required' => 'Masukkan NIK anda!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required', 
            [
                'required' => 'Masukkan Password anda!'
            ]
        );


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('partials/auth_header', $data);
            $this->load->view('Auth/login');
            $this->load->view('partials/auth_footer');
        } else {
            //jika validasi berlajalan
            $this->_login();
        }
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $cekIbu = $this->M_auth->cekUser('ibu', 'nik_ibu', $username);

        if ($cekIbu) {
            foreach ($cekIbu as $ibu) {
                if (password_verify($password, $ibu->password)) {
                    $dataIbu = array(
                        'nik_ibu' => $ibu->nik_ibu,
                        'nama' => $ibu->nama_ibu,
                    );

                    $this->session->set_userdata($dataIbu);

                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', 
                    '<div class="toast-container p-3 bottom-0 start-0 position-absolute">
                        <div class="toast show text-white" style="background-color: #F758AA;">
                        <div class="toast-body d-flex justify-content-between">
                            <p class="mb-0">Password anda salah!</p>
                            <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        </div>
                    </div>');
                    redirect('auth');
                }
            }
        } 
        
        
        $cekPetugas = $this->M_auth->cekUser('petugas', 'username', $username);
        if ($cekPetugas) {
            foreach ($cekPetugas as $row) {
                if (password_verify($password, $row->password)) {
                    $dataPetugas = array(
                        'id_petugas' => $row->id_petugas,
                        'username' => $row->username,
                        'nama' => $row->nama_petugas,
                        'image' => $row->foto
                    );
                    $this->session->set_userdata($dataPetugas);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', 
                    '<div class="toast-container p-3 bottom-0 start-0 position-absolute">
                        <div class="toast show text-white" style="background-color: #F758AA;">
                        <div class="toast-body d-flex justify-content-between">
                            <p class="mb-0">Password anda salah!</p>
                            <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        </div>
                    </div>');
                    redirect('auth');
                }
            }
        } else {
            $this->session->set_flashdata('message', 
            '<div class="toast-container p-3 bottom-0 start-0 position-absolute">
                <div class="toast show text-white" style="background-color: #F758AA;">
                <div class="toast-body d-flex justify-content-between">
                    <p class="mb-0">NIK dan Password anda salah!</p>
                    <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                </div>
            </div>');
            redirect('auth');
        }
    }

    public function regis_ibu()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|is_unique[ibu.nik_ibu]', [
            'required' => 'NIK harus diisi!',
            'numeric' => 'NIK harus berupa Angka!',
            'is_unique' => 'NIK sudah dipakai!'
        ]);

        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required', [
            'required' => 'Tanggal Lahir harus diisi!'
        ]);
        
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required', [
            'required' => 'Golongan Darah harus diisi!'
        ]);

        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required', [
            'required' => 'Pekerjaan harus diisi!'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat harus diisi!'
        ]);

        $this->form_validation->set_rules('no_telp', 'No_telp', 'trim|required|numeric|max_length[13]', [
            'required' => 'No. Handphone harus diisi!'
        ]);

        $this->form_validation->set_rules('agama', 'Agama', 'trim|required', [
            'required' => 'Agama harus diisi!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {

            # code...
            //register gagal dan kembali ke halaman register ibu
            $data['title'] = 'Registrasi Ibu';
            $this->load->view('partials/auth_header', $data);
            $this->load->view('Auth/register_ibu');
            $this->load->view('partials/auth_footer');
        } else {
            //jika register berhasil
            $this->M_auth->register_ibu();
            $this->session->set_flashdata(
                'register-succes',
                '<div class="alert alert-success" role="alert">
                Akun Berhasil Ditambahkan! Silahkan Login
            </div>
            '
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    // public function regis_anak()

    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
    //         'required' => 'Nama Harus Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|is_unique[anak.nik_anak]', [
    //         'required' => 'NIK Harus Diisi!',
    //         'numeric' => 'NIK Harus Berupa Angka!',
    //         'is_unique' => 'NIK Sudah Dipakai!'
    //     ]);
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required', [
    //         'required' => 'Password Harus Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('berat_badan', 'Berat badan', 'trim|required|numeric', [
    //         'required' => 'Berat Badan Harus Diisi!',
    //         'numeric' => 'Berat Badan Harus Berupa Angka!',
    //     ]);
    //     $this->form_validation->set_rules('tinggi_badan', 'Berat badan', 'trim|required|numeric', [
    //         'required' => 'Tinggi Badan Harus Diisi!',
    //         'numeric' => 'Tinggi Badan Harus Berupa Angka!',
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         # code...
    //         $data['title'] = 'Registrasi Anak';
    //         $this->load->view('partials/auth_header', $data);
    //         $this->load->view('Auth/register_anak');
    //         $this->load->view('partials/auth_footer');
    //     } else {
    //         $this->M_auth->register_anak();
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">
    //             Akun Berhasil Ditambahkan! Silahkan Login
    //         </div>
    //         '
    //         );
    //         redirect('auth');
    //     }
    // }
}

/* End of file Auth.php */
