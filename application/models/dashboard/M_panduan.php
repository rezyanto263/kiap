<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_panduan extends CI_Model
{

    public function getPanduan()
    {
        $this->db->select('*');
        $this->db->from('panduan');
        return $this->db->get()->result_array();
    }

    public function add_panduan()
    {
        $config['upload_path']          = './image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
            die;
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
            Data Gagal Ditambah! </div>'
            );
            // switch case redirect
            $kategori = $this->input->post('kategori', true);
            switch ($kategori) {
                case 'ibu':
                    redirect('dashboard/panduan/panduan_ibu');
                    break;
                case 'anak':
                    redirect('dashboard/panduan/panduan_anak');
                    break;
                case 'balita':
                    redirect('dashboard/panduan/panduan_balita');
                    break;
                case 'remaja':
                    redirect('dashboard/panduan/panduan_remaja');
                    break;
            }
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $judul = $this->input->post('judul', true);
            $deskripsi = $this->input->post('deskripsi', true);
            $isi = $this->input->post('isi', true);
            $kategori = $this->input->post('kategori', true);

            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'foto' => $foto,
                'isi' => $isi,
                'kategori' => $kategori,
            ];
            $this->db->insert('panduan', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambah! </div>'
            );
            switch ($kategori) {
                case 'ibu':
                    redirect('dashboard/panduan/panduan_ibu');
                    break;
                case 'anak':
                    redirect('dashboard/panduan/panduan_anak');
                    break;
                case 'balita':
                    redirect('dashboard/panduan/panduan_balita');
                    break;
                case 'remaja':
                    redirect('dashboard/panduan/panduan_remaja');
                    break;
            }
        }
    }

    public function getPanduanByKategori($kategori)
    {
        return $this->db->get_where('panduan', ['kategori' => $kategori])->result_array();
    }

    public function edit_panduan()
    {
        $config['upload_path']          = './image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
            Data Gagal Ditambah! </div>'
            );
            // switch case redirect
            $kategori = $this->input->post('kategori', true);
            switch ($kategori) {
                case 'ibu':
                    redirect('dashboard/panduan/panduan_ibu');
                    break;
                case 'anak':
                    redirect('dashboard/panduan/panduan_anak');
                    break;
                case 'balita':
                    redirect('dashboard/panduan/panduan_balita');
                    break;
                case 'remaja':
                    redirect('dashboard/panduan/panduan_remaja');
                    break;
            }
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $judul = $this->input->post('judul', true);
            $deskripsi = $this->input->post('deskripsi', true);
            $isi = $this->input->post('isi', true);
            $kategori = $this->input->post('kategori', true);
            $id = $this->input->post('id', true);


            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'foto' => $foto,
                'isi' => $isi,
                'kategori' => $kategori,
            ];
            $this->db->where('id', $id);
            $this->db->update('panduan', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambah! </div>'
            );
            switch ($kategori) {
                case 'ibu':
                    redirect('dashboard/panduan/panduan_ibu');
                    break;
                case 'anak':
                    redirect('dashboard/panduan/panduan_anak');
                    break;
                case 'balita':
                    redirect('dashboard/panduan/panduan_balita');
                    break;
                case 'remaja':
                    redirect('dashboard/panduan/panduan_remaja');
                    break;
            }
        }
    }
}

/* End of file M_panduan.php */
