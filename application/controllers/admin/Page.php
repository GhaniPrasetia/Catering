<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tentang_kami()
    {
        $data = [
            'index' => 'admin/page/index',
            'index_js' => 'admin/page/index_js',
            'title' => 'Setting Tentang Kami',
        ];

        $data['data'] = $this->db->query("SELECT * from page where keterangan='tentang_kami' ")->row();
        $this->templates->load($data);
    }

    public function cara_pemesanan()
    {
        $data = [
            'index' => 'admin/page/index',
            'index_js' => 'admin/page/index_js',
            'title' => 'Setting Cara Pemesanan',
        ];

        $data['data'] = $this->db->query("SELECT * from page where keterangan='cara_pesan' ")->row();
        $this->templates->load($data);
    }

    public function preview($id = null)
    {
        $id = decode_id($id);

        $data = [
            'index' => 'admin/page/preview',
            'index_js' => 'admin/page/preview_js',
            'title' => 'Preview',
        ];

        $data['data'] = $this->db->query("SELECT * from page where id='$id' ")->row();
        $this->templates->load($data);
    }

    public function do_submit()
    {
        cek_post();
        $id = decode_id($this->input->post('id'));

        $konten = $this->input->post('konten');

        if (!empty($hapus)) {
            $this->db->where('id', $id);
            $this->db->update('page', [
                'deleted' => date('Y-m-d H:i:s'),
            ]);
        } else {
            if (empty($id)) {
                $this->db->insert('page', [
                    'konten' => $konten,
                    'created' => date('Y-m-d H:i:s'),
                ]);
            } else {
                $this->db->where('id', $id);
                $this->db->update('page', [
                    'konten' => $konten,
                    'updated' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        echo json_encode([
            'status' => 'success'
        ]);
    }

    //Upload image summernote
    function upload_image()
    {
        $this->load->library('upload');
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = './uploads/konten/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = '.uploads/konten/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = '.uploads/konten/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'uploads/konten/' . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }
}
