<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        insert_visitor();
    }

    public function index()
    {
        $data = [
            'index' => 'front/home/index',
            'index_js' => 'front/home/index_js',
            'title' => 'Selamat datang'
        ];
        $this->load->view('front/front_template', $data);
    }

    public function tentang_kami()
    {
        $data = [
            'index' => 'front/page/tentang',
            'index_js' => 'front/page/tentang_js',
            'title' => 'Tentang Kami'
        ];

        $data['page'] = $this->db->query("SELECT * from page where keterangan='tentang_kami' ")->row();
        
        $this->load->view('front/front_template', $data);
    }

    public function cara_pesan()
    {
        $data = [
            'index' => 'front/page/tentang',
            'index_js' => 'front/page/tentang_js',
            'title' => 'Cara Pemesanan'
        ];

        $data['page'] = $this->db->query("SELECT * from page where keterangan='cara_pesan' ")->row();
        
        $this->load->view('front/front_template', $data);
    }
}
