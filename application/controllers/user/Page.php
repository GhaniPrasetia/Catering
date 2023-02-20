<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tentang()
    {
        $data = [
            'index' => 'user/page/tentang',
            'index_js' => 'user/page/tentang_js',
            'title' => 'Tentang Kami',
        ];

        $data['page'] = $this->db->query("SELECT * from page where keterangan='tentang_kami' ")->row();
        $this->templates->load($data);
    }

    public function cara_pesan()
    {
        $data = [
            'index' => 'user/page/tentang',
            'index_js' => 'user/page/tentang_js',
            'title' => 'Cara Pemesanan',
        ];

        $data['page'] = $this->db->query("SELECT * from page where keterangan='cara_pesan' ")->row();
        $this->templates->load($data);
    }
    
}
