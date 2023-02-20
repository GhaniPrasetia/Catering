<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/table_menu_kategori', 'table_kategori');
        $this->load->model('admin/table_menu_list', 'table_list');
    }

    public function list()
    {
        $data = [
            'index' => 'admin/menu/list',
            'index_js' => 'admin/menu/list_js',
            'title' => 'List Menu',
        ];

        $this->templates->load($data);
    }

    public function kategori()
    {
        $data = [
            'index' => 'admin/menu/kategori',
            'index_js' => 'admin/menu/kategori_js',
            'title' => 'Kategori',
        ];

        $this->templates->load($data);
    }

    public function form($id = null)
    {
        $data = [
            'index' => 'admin/menu/form',
            'index_js' => 'admin/menu/form_js',
            'title' => 'Form Menu',
        ];

        if (!empty($id)) {
            $id = decode_id($id);
            $data['data'] = $this->db->query("SELECT * from data_menu where id='$id' and deleted is null")->row();
        }
        $data['kategori'] = $this->db->query("SELECT * from ref_kategori where deleted is null")->result();
        $this->templates->load($data);
    }

    public function table_kategori()
    {
        echo $this->table_kategori->generate_table();
    }

    public function table_list()
    {
        echo $this->table_list->generate_table();
    }

    public function tambah_kategori()
    {
        $data = [];
        $html = $this->load->view('admin/menu/form_kategori', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function ubah_kategori()
    {
        $id = decode_id($this->input->post('id'));
        $data['id'] = $id;
        $data['data'] = $this->db->query("SELECT * from ref_kategori where id='$id' and deleted is null ")->row();
        $html = $this->load->view('admin/menu/form_kategori', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function do_submit_menu()
    {
        cek_post();
        $id = decode_id($this->input->post('id'));
        $hapus = $this->input->post('hapus');

        $deskripsi = $this->input->post('deskripsi');
        $harga = clear_koma($this->input->post('harga'));
        $id_kategori = $this->input->post('id_kategori');
        $nama = $this->input->post('nama');

        if (!empty($hapus)) {
            $this->db->where('id', $id);
            $this->db->update('data_menu', [
                'deleted' => date('Y-m-d H:i:s'),
            ]);
        } else {

            if ($_FILES['gambar']['name']) {
                $path = 'uploads/gambar_menu/';
                if (!file_exists(FCPATH . $path)) mkdir($path, 0777, TRUE);
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 10000; // 0 = no limit || default max 2048 kb
                $config['overwrite'] = false;
                $config['remove_space'] = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $run = $this->upload->do_upload('gambar'); // name inputnya

                if (!$run) {
                    echo json_encode([
                        'status' => 'failed',
                        'msg' => $this->upload->display_errors()
                    ]);
                    die;
                }

                $zdata = ['upload_data' => $this->upload->data()]; // get data
                $zfile = $zdata['upload_data']['full_path']; // get file path
                chmod($zfile, 0777); // linux wajib
                $gambar = $path . $zdata['upload_data']['file_name']; // nama file
                $this->db->set('gambar', $gambar);
            }

            if (empty($id)) {
                $this->db->insert('data_menu', [
                    'deskripsi' => $deskripsi,
                    'harga' => $harga,
                    'id_kategori' => $id_kategori,
                    'nama' => $nama,
                    'created' => date('Y-m-d H:i:s'),
                ]);
            } else {
                $this->db->where('id', $id);
                $this->db->update('data_menu', [
                    'deskripsi' => $deskripsi,
                    'harga' => $harga,
                    'id_kategori' => $id_kategori,
                    'nama' => $nama,
                    'updated' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        echo json_encode([
            'status' => 'success'
        ]);
    }

    public function do_submit_kategori()
    {
        cek_post();
        $id = decode_id($this->input->post('id'));
        $hapus = $this->input->post('hapus');

        $nama = $this->input->post('nama');

        if (!empty($hapus)) {
            $this->db->where('id', $id);
            $this->db->update('ref_kategori', [
                'deleted' => date('Y-m-d H:i:s'),
            ]);
        } else {
            if (empty($id)) {
                $this->db->insert('ref_kategori', [
                    'nama' => $nama,
                    'created' => date('Y-m-d H:i:s'),
                ]);
            } else {
                $this->db->where('id', $id);
                $this->db->update('ref_kategori', [
                    'nama' => $nama,
                    'updated' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        echo json_encode([
            'status' => 'success'
        ]);
    }
}
