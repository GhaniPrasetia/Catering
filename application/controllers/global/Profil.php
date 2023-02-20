<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'index' => 'profil/index',
            'index_js' => 'profil/index_js',
            'title' => 'Profil',

            'data' => $this->db->query("SELECT 
                a.*, b.nama as nama_kec, c.nama as nama_kel
                from data_user a 
                left join ref_kecamatan b on b.kode_wilayah=a.kode_kec
                left join ref_kelurahan c on c.kode_wilayah=a.kode_kel
                where a.id='$this->id_akun'
            ")->row()
        ];

        $this->templates->load($data);
    }

    public function edit()
    {
        $data = [
            'index' => 'profil/edit',
            'index_js' => 'profil/edit_js',
            'title' => 'Edit Profil',

            'data' => $this->db->query("SELECT 
                a.*, b.nama as nama_kec, c.nama as nama_kel
                from data_user a 
                left join ref_kecamatan b on b.kode_wilayah=a.kode_kec
                left join ref_kelurahan c on c.kode_wilayah=a.kode_kel
                where a.id='$this->id_akun'
            ")->row(),
        ];

        $data['ref_kec'] = $this->db->query("SELECT 
            * from ref_kecamatan
        ")->result();

        $kode_kec = $data['data']->kode_kec;
        if ($kode_kec != null) {
            $data['ref_kel'] = $this->db->query("SELECT 
                * from ref_kelurahan where kode_kec=$kode_kec
            ")->result();
        }

        $this->templates->load($data);
    }

    public function do_submit()
    {
        cek_post();
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $re_password = $this->input->post('re_password');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');        

        $foto = $this->input->post('foto');
        $nama_foto = time() . '_' . $this->input->post('nama_foto');

        $cek_email = $this->db->query("SELECT * from data_user where deleted is null and email='$email' and id !='$this->id_akun' ")->row();
        $cek_no_hp = $this->db->query("SELECT * from data_user where deleted is null and no_hp='$no_hp' and id !='$this->id_akun' ")->row();

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

        if (!empty($cek_nik)) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'NIK sudah terdaftar',
            ]);
            die;
        }

        if (!empty($password)) {
            if ($password != $re_password) {
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'password tidak sama',
                ]);
                die;
            } else {
                $this->db->set('password', sha1($password));
            }
        }

        if (!empty($foto)) {
            $path = FCPATH . 'uploads/users/' . session('id_akun');
            if (!file_exists($path)) {
                mkdir($path, 0777, TRUE);
            }
            $file_name = 'uploads/users/' . session('id_akun') . '/' . $nama_foto;
            $image_array_1 = explode(";", $foto);
            $image_array_2 = explode(",", $image_array_1[1]);
            $foto = base64_decode($image_array_2[1]);
            file_put_contents(FCPATH . 'uploads/users/' . session('id_akun') . '/' . $nama_foto, $foto);
            $this->session->set_userdata('foto', $file_name);
            $this->db->set('foto', $file_name);
        }

        $this->session->set_userdata('nama', $nama);
        $this->session->set_userdata('username', $username);
        $this->session->set_userdata('kelurahan', $kelurahan);

        $this->db->where('id', session('id_akun'));
        $this->db->update('data_user', [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'kode_kec' => $kecamatan,
            'kode_kel' => $kelurahan,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'updated' => date('Y-m-d H:i:s')
        ]);

        echo json_encode([
            'status' => 'success',
            'msg' => 'berhasil memperbarui data',
        ]);
    }

    public function get_kelurahan()
    {
        $id_kec = $this->input->post('id_kec');
        $data = $this->db->get_where('ref_kelurahan', [
            'kode_kec' => $id_kec,
        ])->result();
        echo json_encode([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}

/* End of file Dashboard.php */
