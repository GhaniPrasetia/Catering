<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paketan extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/table_paketan', 'table');
    }

    public function index()
    {
        $data = [
            'index' => 'admin/paketan/index',
            'index_js' => 'admin/paketan/index_js',
            'title' => 'Paketan Menu',
        ];

        $this->templates->load($data);
    }

    public function table()
    {
        echo $this->table->generate_table();
    }

    public function tambah()
    {
        $data['all'] = $this->db->query("SELECT * from data_menu where deleted is null")->result();
        $data['data_menu'] = [];
        $html = $this->load->view('admin/paketan/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function ubah()
    {
        $id = decode_id($this->input->post('id'));
        $data['id'] = $id;
        $data['all'] = $this->db->query("SELECT * from data_menu where deleted is null")->result();
        $data['data'] = $this->db->query("SELECT * from paketan where id='$id' and deleted is null ")->row();

        $menu = $this->db->query("SELECT * from paketan_has_detail where id_paketan='$id' and deleted is null ")->result();
        $arr_menu = [];
        foreach ($menu as $key) {
            $arr_menu[] = $key->id_menu;
        }
        $data['data_menu'] = $arr_menu;
        $html = $this->load->view('admin/paketan/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function do_submit()
    {
        cek_post();
        $id = decode_id($this->input->post('id'));
        $hapus = $this->input->post('hapus');

        $harga = clear_koma($this->input->post('harga'));
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $menu = $this->input->post('menu');

        if (!empty($hapus)) {
            $this->db->where('id', $id);
            $this->db->update('paketan', [
                'deleted' => date('Y-m-d H:i:s'),
            ]);
        } else {
            if (empty($id)) {
                $this->db->insert('paketan', [
                    'nama' => $nama,
                    'harga' => $harga,
                    'keterangan' => $keterangan,
                    'created' => date('Y-m-d H:i:s'),
                ]);
                $id_insert = $this->db->insert_id();

                foreach ($menu as $key) {
                    $arr[] = [
                        'id_paketan' => $id_insert,
                        'id_menu' => $key,
                        'created' => date('Y-m-d H:i:s'),
                    ];
                }

                if (!empty($arr)) {
                    $this->db->insert_batch('paketan_has_detail', $arr);
                }
            } else {
                $this->db->where('id_paketan', $id);
                $this->db->delete('paketan_has_detail');

                $this->db->where('id', $id);
                $this->db->update('paketan', [
                    'nama' => $nama,
                    'harga' => $harga,
                    'keterangan' => $keterangan,
                    'updated' => date('Y-m-d H:i:s'),
                ]);

                foreach ($menu as $key) {
                    $arr[] = [
                        'id_paketan' => $id,
                        'id_menu' => $key,
                        'created' => date('Y-m-d H:i:s'),
                    ];
                }

                if (!empty($arr)) {
                    $this->db->insert_batch('paketan_has_detail', $arr);
                }
            }
        }

        echo json_encode([
            'status' => 'success'
        ]);
    }
}
