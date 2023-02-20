<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends MY_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/table_user', 'table');
    }

    public function index()
    {
        $data = [
            'index' => 'admin/data_user/index',
            'index_js' => 'admin/data_user/index_js',
            'title' => 'Data User',
        ];

        $this->templates->load($data);
    }

    public function table()
    {
        echo $this->table->generate_table();
    }

    public function tambah()
    {
        $otoritas = decode_id($this->input->post('otoritas'));
        $data['otoritas'] = $otoritas;

        $data['ref_kec'] = $this->db->query("SELECT 
            * from ref_kecamatan
        ")->result();

        $data['ref_kel'] = [];

        $html = $this->load->view('admin/data_user/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
            'type' => $otoritas == 3 ? 'Operator' : 'Admin',
        ]);
    }

    public function ubah()
    {
        $id = decode_id($this->input->post('id'));
        $otoritas = decode_id($this->input->post('otoritas'));

        $data['otoritas'] = $otoritas;

        $data['data'] = $this->db->query("SELECT
            a.*, b.otoritas as nama_otoritas from data_user a 
            left join dev_otoritas b on b.id=a.id_otoritas
            where a.id='$id' and a.deleted is null 
        ")->row();

        $data['ref_kec'] = $this->db->query("SELECT 
            * from ref_kecamatan where
        ")->result();

        $kode_kec = $data['data']->kode_kec;
        if ($kode_kec != null) {
            $data['ref_kel'] = $this->db->query("SELECT 
                * from ref_kelurahan where kode_kec=$kode_kec
            ")->result();
        }

        $html = $this->load->view('admin/data_user/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
            'type' => $data['data']->nama_otoritas,
        ]);
    }

    public function do_submit()
    {
        cek_post();
        $id = decode_id($this->input->post('id'));
        $otoritas = decode_id($this->input->post('otoritas'));
        $hapus = $this->input->post('hapus');

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $re_password = $this->input->post('re_password');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');

        $cek_username = $this->db->query("SELECT * from data_user where deleted is null and username='$username' ")->row();
        $cek_email = $this->db->query("SELECT * from data_user where deleted is null and email='$email' ")->row();
        $cek_no_hp = $this->db->query("SELECT * from data_user where deleted is null and no_hp='$no_hp' ")->row();

        if (!empty($id)) {
            $cek_username = $this->db->query("SELECT * from data_user where deleted is null and username='$username' and id !='$id' ")->row();
            $cek_email = $this->db->query("SELECT * from data_user where deleted is null and email='$email' and id !='$id' ")->row();
            $cek_no_hp = $this->db->query("SELECT * from data_user where deleted is null and no_hp='$no_hp' and id !='$id' ")->row();
        }

        if (!empty($cek_username)) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'username sudah digunakan',
            ]);
            die;
        }

        if (!empty($cek_email)) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'email sudah digunakan',
            ]);
            die;
        }

        if (!empty($cek_no_hp)) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'nomer hp sudah digunakan',
            ]);
            die;
        }

        if ($password != $re_password) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'password tidak sama',
            ]);
            die;
        }

        if ($hapus) {
            $this->db->where('id', $id);
            $this->db->update('data_user', [
                'deleted' => date('Y-m-d H:i:s')
            ]);
        } else {
            if (empty($id)) {
                $this->db->insert('data_user', [
                    'id_otoritas' => $otoritas,
                    'nama' => $nama,
                    'username' => $username,
                    'password' => sha1($password),
                    'email' => $email,
                    'kode_kec' => $kecamatan,
                    'kode_kel' => $kelurahan,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'foto' => 'uploads/img/img_error.png',
                    'created' => date('Y-m-d H:i:s')
                ]);
            } else {
                $this->db->where('id', $id);
                $this->db->update('data_user', [
                    'id_otoritas' => $otoritas,
                    'nama' => $nama,
                    'username' => $username,
                    'password' => sha1($password),
                    'email' => $email,
                    'kode_kec' => $kecamatan,
                    'kode_kel' => $kelurahan,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'foto' => 'uploads/img/img_error.png',
                    'updated' => date('Y-m-d H:i:s')
                ]);
            }
        }

        echo json_encode([
            'status' => 'success',
            'msg' => 'berhasil menyimpan data',
        ]);
    }
}
