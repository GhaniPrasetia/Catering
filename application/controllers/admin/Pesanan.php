<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('user/table_pesanan', 'table');
    }

    public function index()
    {
        $data = [
            'index' => 'admin/pesanan/index',
            'index_js' => 'admin/pesanan/index_js',
            'title' => 'Pesanan Saya',
        ];

        $this->templates->load($data);
    }

    public function table()
    {
        echo $this->table->generate_table();
    }

    public function tambah()
    {
        $data = [];
        $html = $this->load->view('admin/pesanan/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function load()
    {
        cek_post();
        $id = $this->input->post('id');

        if ($id == 'batal') {
            $all = $this->db->query("SELECT * from pesanan where status in ('4','5') and deleted is null ")->result();
        } else {
            $all = $this->db->query("SELECT * from pesanan where status='$id' and deleted is null ")->result();
        }

        $data['all'] = $all;
        $data['status'] = $id;
        $html = $this->load->view('admin/pesanan/list', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function update_status()
    {
        cek_post();
        $id_pesanan = $this->input->post('id_pesanan');
        $status = $this->input->post('status');

        $this->db->where('id', $id_pesanan);
        $this->db->update('pesanan', [
            'status' => $status,
            'updated' => date('Y-m-d H:i:d'),
        ]);

        echo json_encode([
            'status' => 'success',
        ]);
    }

    public function do_submit_bukti()
    {
        cek_post();
        $id = $this->input->post('id');

        if ($_FILES['gambar']['name']) {
            $path = 'uploads/bukti_tf/';
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

            $this->db->where('id', $id);
            $this->db->update('pesanan', [
                'status' => 2,
                'bukti_bayar' => $gambar,
                'updated' => date('Y-m-d H:i:d'),
            ]);
        }

        echo json_encode([
            'status' => 'success'
        ]);
    }
}
