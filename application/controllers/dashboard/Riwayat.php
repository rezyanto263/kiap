<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('id_petugas') == 0) {
            redirect('auth', 'refresh');
        }
        $this->load->model('dashboard/M_riwayat');
    }

    // View
    public function pertumbuhan()
    {
        $query = [
            'pertumbuhan' => $this->M_riwayat->r_pertumbuhan(),
            'tb_pertumbuhan' => $this->M_riwayat->allData('riwayat_pertumbuhan'),
            'daftar_periksa' => $this->M_riwayat->r_daftar_periksa(),
            'anak' => $this->M_riwayat->allData('anak'),
        ];
        $data['title'] = 'Riwayat Pertumbuhan Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pertumbuhan', $query);
        $this->load->view('partials/dash_footer.php');
    }

    public function vaksin()
    {
        $query = [
            'vaksin' => $this->M_riwayat->r_vaksin(),
            'tb_r_vaksin' => $this->M_riwayat->allData('riwayat_vaksin'),
            'daftar_periksa' => $this->M_riwayat->r_daftar_periksa(),
            'j_vaksin' => $this->M_riwayat->allData('vaksin'),
            'anak' => $this->M_riwayat->allData('anak'),
        ];
        $data['title'] = 'Riwayat Vaksin Pasien';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/r_vaksin', $query);
        $this->load->view('partials/dash_footer.php');
    }

    public function jenis_vaksin()
    {
        $query = [
            'j_vaksin' => $this->M_riwayat->j_vaksin(),
        ];
        $data['title'] = 'Daftar Jenis Vaksin';
        $this->load->view('partials/dash_header.php', $data);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/vaksin', $query);
        $this->load->view('partials/dash_footer.php');
    }

    public function pemeriksaan()
    {
        $query = [
            'pemeriksaan' => $this->M_riwayat->r_pemeriksaan(),
            'tb_pemeriksaan' => $this->M_riwayat->alldata('riwayat_pemeriksaan'),
            'daftar_periksa' => $this->M_riwayat->r_daftar_periksa(),
            'ibu' => $this->M_riwayat->alldata('ibu'),
            'anak' => $this->M_riwayat->alldata('anak'),
        ];
        $title['title'] = 'Riwayat Pemeriksaan Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/pemeriksaan', $query);
        $this->load->view('partials/dash_footer.php');
    }

    public function daftar_periksa()
    {
        $query = [
            'dataPeriksa' => $this->M_riwayat->r_daftar_periksa(),
            'dataDokter' => $this->M_riwayat->allData('dokter'),
            'dataRuangan' => $this->M_riwayat->allData('ruangan'),
            'tb_periksa' => $this->M_riwayat->allData('pemeriksaan')
        ];
        $title['title'] = 'Riwayat Daftar Periksa Pasien';
        $this->load->view('partials/dash_header.php', $title);
        $this->load->view('partials/dash_sidebar.php');
        $this->load->view('partials/dash_topbar.php');
        $this->load->view('dashboard/daftar_periksa', $query);
        $this->load->view('partials/dash_footer.php');
    }


    // Proses Daftar Periksa
    public function tambah_daftar_periksa() {
        date_default_timezone_set('Asia/Kuala Lumpur');
        $cekIbu = $this->M_riwayat->allData('ibu');
        $ada = false;
        foreach ($cekIbu as $key) : {
            if ($key['nik_ibu'] == $this->input->post('nik_ibu')) {
                $ada = true;
            } 
        } endforeach;   
        if (!($ada)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
            Data gagal Ditambahkan! NIK Ibu tidak ditemukan!</div>'
            );
            redirect('dashboard/riwayat/daftar_periksa');
        }
        $jumlah = ['',$this->input->post('kategori1'), $this->input->post('kategori2'),  $this->input->post('kategori3')];
        $nip_dokter = ['',$this->input->post('nip_dokter1'), $this->input->post('nip_dokter2'),  $this->input->post('nip_dokter3')];
        $id_ruangan = ['',$this->input->post('id_ruangan1'), $this->input->post('id_ruangan2'),  $this->input->post('id_ruangan3')];
        if ($jumlah[1] == 1) {
            $kategori[1] = 'Kandungan';
        }
        if ($jumlah[2] == 1) {
            $kategori[2] = 'Ibu';
        }
        if ($jumlah[3] == 1) {
            $kategori[3] = 'Anak';
        }
        
        $i = 0;
        while ($i < 3) {
            $i+=1;
            if (!empty($kategori[$i]) && !($cekKategori==1)) {
                $data = array(
                    'tanggal_periksa' => date('Y-m-d'),
                    'kategori' => $kategori[$i],
                    'nik_ibu' => $this->input->post('nik_ibu'),
                    'id_petugas' => $this->input->post('id_petugas'),
                    'nip_dokter' => $nip_dokter[$i],
                    'id_ruangan' => $id_ruangan[$i]
                );
                $cekKategori = $this->M_riwayat->allData('pemeriksaan');
                $belum = true;
                foreach ($cekKategori as $key) {
                    if ($key['kategori']==$kategori[$i] && $key['nik_ibu']==$this->input->post('nik_ibu') && $key['tanggal_periksa']==date('Y-m-d')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Data Gagal Ditambahkan! Pasien sudah periksa dengan kategori yang sama hari ini!</div>');
                        $belum = false;
                        redirect('dashboard/riwayat/daftar_periksa');
                    }
                }
                if ($belum==true) {
                    $this->M_riwayat->tambahRiwayat('pemeriksaan', $data);
                }
            }
        }
        if (empty($kategori)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Gagal Ditambahkan! Kategori harus diisi!</div>');
            redirect('dashboard/riwayat/daftar_periksa');
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>');

        redirect('dashboard/riwayat/daftar_periksa');
    }

    public function edit_daftar_periksa() {
        date_default_timezone_set('Asia/Kuala Lumpur');
        $cekIbu = $this->M_riwayat->allData('ibu');
        $ada = false;
        foreach ($cekIbu as $key) : {
            if ($key['nik_ibu'] == $this->input->post('nik_ibu')) {
                $ada = true;
            } 
        } endforeach;   
        if (!($ada)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
            Data gagal Dirubah! NIK Ibu tidak ditemukan!</div>'
            );
            redirect('dashboard/riwayat/daftar_periksa');
        }
        $nip_dokter = ['',$this->input->post('nip_dokter1'), $this->input->post('nip_dokter2'),  $this->input->post('nip_dokter3')];
        $id_ruangan = ['',$this->input->post('id_ruangan1'), $this->input->post('id_ruangan2'),  $this->input->post('id_ruangan3')];
        $i = 0;
        while ($i < 3) {
            $i+=1;
            if (!empty($id_ruangan[$i])) {
                $update = array(
                    'nik_ibu' => $this->input->post('nik_ibu'),
                    'tanggal_periksa' => date('Y-m-d'),
                    'id_petugas' => $this->input->post('id_petugas'),
                    'nip_dokter' => $nip_dokter[$i],
                    'id_ruangan' => $id_ruangan[$i]
                );
                
            $this->M_riwayat->editSatuRiwayat('pemeriksaan', $update, 'id_periksa', $this->input->post('id_periksa'));
            }
        }
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dirubah! </div>');

        redirect('dashboard/riwayat/daftar_periksa');
    }

    public function hapus_daftar_periksa($id_periksa) {
        $this->M_riwayat->hapusSatuRiwayat('pemeriksaan', 'id_periksa', $id_periksa);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>');

        redirect('dashboard/riwayat/daftar_periksa');
    }


    // Proses Riwayat Pemeriksaan
    public function tambah_riwayat_pemeriksaan() {
        $cekIdPeriksaIbu = $this->M_riwayat->cekSatuRiwayat('pemeriksaan', 'id_periksa', $this->input->post('id_periksa'))->row_array();
        $cekIdPeriksaAnak = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->row_array();
        $sesuai=false;
        if (($cekIdPeriksaIbu['nik_ibu']==$cekIdPeriksaAnak['nik_ibu']) || ($cekIdPeriksaIbu['nik_ibu']==$this->input->post('nik_ibu'))) {
            $sesuai = true;
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Gagal Ditambahkan! Data pemeriksaan tidak sesuai! </div>');   

            redirect('dashboard/riwayat/pemeriksaan');
        }
        if ($sesuai==true) {
            $cekIdPeriksa = $this->M_riwayat->cekSatuRiwayat('riwayat_pemeriksaan', 'id_periksa', $this->input->post('id_periksa'))->num_rows();
            $cekPasien = ['', $this->input->post('pasien1'), $this->input->post('pasien2')];
            $pasien = ['', $this->input->post('pasien1'), $this->input->post('pasien2')];
            $keluhan = ['', $this->input->post('keluhani'), $this->input->post('keluhana')];
            $keterangan = ['', $this->input->post('keterangani'), $this->input->post('keterangana')];
            $catatan = ['', $this->input->post('catatani'), $this->input->post('catatana')];
            $nik = ['', $this->input->post('nik_ibu'), $this->input->post('nik_anak')];
            if (!is_null($cekPasien[1]) && !is_null($cekPasien[2]) && ($cekIdPeriksa==0)) {
                $i = 1;
                while ($i <= 2) {
                    if ($i == 1) {
                        $arrayData = array(
                            'id_periksa' => $this->input->post('id_periksa'),
                            'keluhan' => $keluhan[$i],
                            'keterangan' => $keterangan[$i],
                            'catatan' => $catatan[$i],
                            'nik_ibu' => $nik[1],
                            'pasien' => $pasien[$i]
                        );
                        $this->M_riwayat->tambahRiwayat('riwayat_pemeriksaan', $arrayData);
                    } else {
                        $arrayData = array(
                            'id_periksa' => $this->input->post('id_periksa'),
                            'keluhan' => $keluhan[$i],
                            'keterangan' => $keterangan[$i],
                            'catatan' => $catatan[$i],
                            'nik_anak' => $nik[2],
                            'pasien' => $pasien[$i]
                        );
                        $this->M_riwayat->tambahRiwayat('riwayat_pemeriksaan', $arrayData);
                    }
                    $i++;
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan! </div>');    
                redirect('dashboard/riwayat/pemeriksaan');
            } else if ((!is_null($cekPasien[1]) || !is_null($cekPasien[2])) && ($cekIdPeriksa==0)) {
                if (!is_null($cekPasien[1])) {
                    $arrayData = array(
                        'id_periksa' => $this->input->post('id_periksa'),
                        'keluhan' => $keluhan[1],
                        'keterangan' => $keterangan[1],
                        'catatan' => $catatan[1],
                        'nik_ibu' => $nik[1],
                        'pasien' => $pasien[1]
                    );
                } else if (!is_null($cekPasien[2])) {
                    $arrayData = array(
                        'id_periksa' => $this->input->post('id_periksa'),
                        'keluhan' => $keluhan[2],
                        'keterangan' => $keterangan[2],
                        'catatan' => $catatan[2],
                        'nik_anak' => $nik[2],
                        'pasien' => $pasien[2]
                    );
                }
                $this->M_riwayat->tambahRiwayat('riwayat_pemeriksaan', $arrayData);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan! </div>');    
                redirect('dashboard/riwayat/pemeriksaan');
            }else if(is_null($cekPasien[1]) && is_null($cekPasien[2])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Pasien harus diisi!</div>'); 
                redirect('dashboard/riwayat/pemeriksaan');
            }else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Data Pemeriksaan sudah ada!</div>');
                redirect('dashboard/riwayat/pemeriksaan');
            }
        }
    }   
    public function edit_riwayat_pemeriksaan() {
        $data = array (
            'nik_anak' => $this->input->post('nik_anak'),
            'keluhan' => $this->input->post('keluhan'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),
        );
        $this->M_riwayat->editSatuRiwayat('riwayat_pemeriksaan', $data,'id_periksa', $this->input->post('id'));
        redirect('dashboard/riwayat/pemeriksaan');
    }
    public function hapus_riwayat_pemeriksaan($id_pemeriksaan) {
        $this->M_riwayat->hapusSatuRiwayat('riwayat_pemeriksaan', 'id_periksa', $id_pemeriksaan);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>');

        redirect('dashboard/riwayat/pemeriksaan');
    }


    // Proses Riwayat Pertumbuhan
    public function tambah_riwayat_pertumbuhan() {
        $cekAnak = $this->M_riwayat->cekSatuRiwayat('riwayat_pertumbuhan', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        foreach ($cekAnak as $key) {
            if (($key['nik_anak']==$this->input->post('nik_anak'))) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Data pemeriksaan sudah ada!</div>');
    
                redirect('dashboard/riwayat/pertumbuhan');
            }
        }
        $cekIdPeriksa = $this->M_riwayat->cekSatuRiwayat('pemeriksaan', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        $cekAnak2 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->result_array();
        foreach ($cekIdPeriksa as $key) {
            foreach ($cekAnak2 as $value) {
                if ($key['nik_ibu']!=$value['nik_ibu']) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Data Gagal Ditambahkan! Data pemeriksaan tidak sesuai!</div>');
        
                    redirect('dashboard/riwayat/pertumbuhan');
                }  
            }
        }
        $data = array(
            'id_periksa' => $this->input->post('id_periksa'),
            'nik_anak' => $this->input->post('nik_anak'),
            'tb' => $this->input->post('tb'),
            'bb' => $this->input->post('bb'),
            'lk' => $this->input->post('lk'),
            'status_gizi' => $this->input->post('gizi'),
            'catatan' => $this->input->post('catatan'),
        );
        $this->M_riwayat->tambahRiwayat('riwayat_pertumbuhan', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>');    

        redirect('dashboard/riwayat/pertumbuhan');
    }
    public function edit_riwayat_pertumbuhan() {
        $cekAnak = $this->M_riwayat->cekSatuRiwayat('riwayat_pertumbuhan', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        foreach ($cekAnak as $key) {
            if (($key['nik_anak']==$this->input->post('nik_anak'))) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Dirubah! Data pemeriksaan sudah ada!</div>');
    
                redirect('dashboard/riwayat/pertumbuhan');
            }
        }
        $update = array(
            'nik_anak' => $this->input->post('nik_anak'),
            'tb' => $this->input->post('tb'),
            'bb' => $this->input->post('bb'),
            'lk' => $this->input->post('lk'),
            'status_gizi' => $this->input->post('gizi'),
            'catatan' => $this->input->post('catatan'),
        );

        $this->M_riwayat->editSatuRiwayat('riwayat_pertumbuhan', $update, 'id', $this->input->post('id'));
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dirubah! </div>');    

        redirect('dashboard/riwayat/pertumbuhan');
    }
    public function hapus_riwayat_pertumbuhan($id) {
        $this->M_riwayat->hapusSatuRiwayat('riwayat_pertumbuhan', 'id', $id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>');

        redirect('dashboard/riwayat/pertumbuhan');
    }

    // Proses Riwayat Vaksin
    public function tambah_riwayat_vaksin() {   
        $cekAnak = $this->M_riwayat->cekSatuRiwayat('riwayat_vaksin', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        foreach ($cekAnak as $key) {
            if (($key['nik_anak']==$this->input->post('nik_anak'))) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Data pemeriksaan sudah ada!</div>');
    
                redirect('dashboard/riwayat/vaksin');
            }
        }
        $cekIdPeriksa = $this->M_riwayat->cekSatuRiwayat('pemeriksaan', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        $cekAnak2 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->result_array();
        foreach ($cekIdPeriksa as $key) {
            foreach ($cekAnak2 as $value) {
                if ($key['nik_ibu']!=$value['nik_ibu']) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Data Gagal Ditambahkan! Data pemeriksaan tidak sesuai!</div>');
        
                    redirect('dashboard/riwayat/vaksin');
                }  
            }
        }
        $cekAnak3 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->result_array();
        foreach ($cekAnak3 as $value) {
            $cek1 = strtotime($this->input->post('tgl_vaksin'));
            $cek2 = strtotime($value['tgl_lahir']);
            if ($cek1 < $cek2) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Tanggal vaksinasi tidak benar!</div>');
    
                redirect('dashboard/riwayat/vaksin');
            }
        }
        $cekAnak3 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->row_array();
        $tgl_lahir1=$cekAnak3['tgl_lahir'];
        $tgl_vaksin = new DateTime($this->input->post('tgl_vaksin'));
        $tgl_lahir = new DateTime($tgl_lahir1);
        $umur = $tgl_vaksin->diff($tgl_lahir);
        $data = array(
            'id_periksa' => $this->input->post('id_periksa'),
            'nik_anak' => $this->input->post('nik_anak'),
            'id_vaksin' => $this->input->post('id_vaksin'),
            'tgl_vaksin' => $this->input->post('tgl_vaksin'),
            'usia_vaksin' => $umur->y.' Tahun '.$umur->m.' Bulan '.$umur->d.' Hari',
            'catatan' => $this->input->post('catatan'),
        );
        $this->M_riwayat->tambahRiwayat('riwayat_vaksin', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambah! </div>');

        redirect('dashboard/riwayat/vaksin');
    }
    public function edit_riwayat_vaksin() {
        $cekAnak = $this->M_riwayat->cekSatuRiwayat('riwayat_vaksin', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        foreach ($cekAnak as $key) {
            if (($key['nik_anak']==$this->input->post('nik_anak'))) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Data pemeriksaan sudah ada!</div>');
    
                redirect('dashboard/riwayat/vaksin');
            }
        }
        $cekIdPeriksa = $this->M_riwayat->cekSatuRiwayat('pemeriksaan', 'id_periksa', $this->input->post('id_periksa'))->result_array();
        $cekAnak2 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->result_array();
        foreach ($cekIdPeriksa as $key) {
            foreach ($cekAnak2 as $value) {
                if ($key['nik_ibu']!=$value['nik_ibu']) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Data Gagal Ditambahkan! Data pemeriksaan tidak sesuai!</div>');
        
                    redirect('dashboard/riwayat/vaksin');
                }  
            }
        }
        $cekAnak3 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->result_array();
        foreach ($cekAnak3 as $value) {
            $cek1 = strtotime($this->input->post('tgl_vaksin'));
            $cek2 = strtotime($value['tgl_lahir']);
            if ($cek1 < $cek2) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Tanggal vaksinasi tidak benar!</div>');
    
                redirect('dashboard/riwayat/vaksin');
            }
        }
        $cekAnak4 = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $this->input->post('nik_anak'))->row_array();
        $tgl_lahir1=$cekAnak4['tgl_lahir'];
        $tgl_vaksin = new DateTime($this->input->post('tgl_vaksin'));
        $tgl_lahir = new DateTime($tgl_lahir1);
        $umur = $tgl_vaksin->diff($tgl_lahir);
        $update = array(
            'tgl_vaksin' => $this->input->post('tgl_vaksin'),
            'nik_anak' => $this->input->post('nik_anak'),
            'id_vaksin' => $this->input->post('id_vaksin'),
            'nik_anak' => $this->input->post('nik_anak'),
            'usia_vaksin' => $umur->y.' Tahun '.$umur->m.' Bulan '.$umur->d.' Hari',
            'catatan' => $this->input->post('catatan'),
        );
        $this->M_riwayat->editSatuRiwayat('riwayat_vaksin', $update, 'id', $this->input->post('id'));
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dirubah! </div>');

        redirect('dashboard/riwayat/vaksin');
    }
    public function hapus_riwayat_vaksin($id) {
        $this->M_riwayat->hapusSatuRiwayat('riwayat_vaksin', 'id', $id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>');

        redirect('dashboard/riwayat/vaksin');
    }

    // Proses Jenis Vaksin
    public function tambah_jenis_vaksin() {
        $cekVaksin = $this->M_riwayat->allData('vaksin');
        foreach ($cekVaksin as $key) {
            if ($key['nama']==$this->input->post('nama')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Nama vaksin sudah ada!</div>');
    
                redirect('dashboard/riwayat/jenis_vaksin');
            }
        }
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis' => $this->input->post('jenis'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->M_riwayat->tambahRiwayat('vaksin', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambah! </div>');

        redirect('dashboard/riwayat/jenis_vaksin');
    }
    public function edit_jenis_vaksin() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis' => $this->input->post('jenis'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->M_riwayat->editRiwayat('vaksin', $data, 'id_vaksin', $this->input->post('id_vaksin'));
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dirubah! </div>');

        redirect('dashboard/riwayat/jenis_vaksin');
    }
    public function hapus_jenis_vaksin($id_vaksin) {
        $this->M_riwayat->hapusSatuRiwayat('vaksin', 'id_vaksin', $id_vaksin);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>');

        redirect('dashboard/riwayat/jenis_vaksin');
    }
}

/* End of file Riwayat.php */
