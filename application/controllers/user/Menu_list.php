<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_list extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'index' => 'user/menu_list/index',
            'index_js' => 'user/menu_list/index_js',
            'title' => 'List Menu',
        ];

        $this->templates->load($data);
    }

    public function getAll()
    {
        $data['all'] = $this->db->query("SELECT a.*, b.nama as kategori from data_menu a 
        left join ref_kategori b on b.id=a.id_kategori
        where a.deleted is null order by a.id desc")->result();

        $data['all_paketan'] = $this->db->query("SELECT a.*, GROUP_CONCAT(concat(c.nama,' - ',c.harga) separator '<br>') as list from paketan a 
        left join paketan_has_detail b on b.id_paketan=a.id and b.deleted is null 
        left join data_menu c on c.id=b.id_menu and c.deleted is null 
        where a.deleted is null 
        GROUP BY a.id order by id desc")->result();

        $html = $this->load->view('user/menu_list/list', $data, TRUE);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function order()
    {
        cek_post();
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');

        $this->db->insert('keranjang', [
            'id_user' => $this->id_akun,
            'id_menu' => $id,
            'jenis' => $type,
            'quantity' => $qty,
            'created' => date('Y-m-d H:i:s'),
        ]);

        echo json_encode([
            'status' => 'success',
        ]);
    }

    public function keranjang()
    {
        $data['all'] = $this->db->query("SELECT
                a.*,
                
                case when a.jenis='menu' then b.nama 
                when a.jenis='paketan' then c.nama 
                end as nama_menu,
                
                case when a.jenis='menu' then b.harga
                when a.jenis='paketan' then c.harga 
                end as harga_menu
            FROM
                keranjang a 
                left join data_menu b on b.id=a.id_menu
                left join paketan c on c.id=a.id_menu
            WHERE
                (a.id_user = '$this->id_akun' OR a.id_user=0) and a.deleted IS NULL 
            ORDER BY
                a.id ASC
        ")->result();

        $data['total'] = $this->db->query("SELECT
                sum(
                    a.quantity *
                    (case when a.jenis='menu' then b.harga 
                    when a.jenis='paketan' then c.harga end)
                ) as total
            FROM
                keranjang a 
                left join data_menu b on b.id=a.id_menu
                left join paketan c on c.id=a.id_menu
            WHERE
                (a.id_user = '$this->id_akun' OR a.id_user=0) and a.deleted IS NULL
        ")->row()->total;

        $html = $this->load->view('user/menu_list/keranjang', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function batalkan()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('keranjang', [
            'deleted' => date('Y-m-d H:i:s'),
        ]);

        echo json_encode([
            'status' => 'success',
        ]);
    }

    public function proses_pesanan()
    {
        cek_post();
        $get_keranjang = $this->db->query("SELECT
            a.*,
            
            case when a.jenis='menu' then b.nama 
            when a.jenis='paketan' then c.nama 
            end as nama_menu,
            
            case when a.jenis='menu' then b.harga
            when a.jenis='paketan' then c.harga 
            end as harga_menu,
            a.quantity * (case when a.jenis='menu' then b.harga
            when a.jenis='paketan' then c.harga
            end) as sub_total
        FROM
            keranjang a 
            left join data_menu b on b.id=a.id_menu
            left join paketan c on c.id=a.id_menu
        WHERE
            (a.id_user = '$this->id_akun' OR a.id_user=0) and a.deleted IS NULL 
        ORDER BY
            a.id DESC")->result();

        $this->db->insert('pesanan', [
            'id_user' => $this->id_akun,
            'status' => 1,
            'created' => date('Y-m-d H:i:s'),
        ]);

        $id_pesanan = $this->db->insert_id();

        foreach ($get_keranjang as $dt) {
            $arr[] = [
                'id_pesanan' => $id_pesanan,
                'id_menu' => $dt->id_menu,
                'jenis' => $dt->jenis,
                'harga' => $dt->harga_menu,
                'quantity' => $dt->quantity,
                'sub_total' => $dt->sub_total,
                'created' => date('Y-m-d H:i:s'),
            ];
        }

        if (!empty($arr)) {
            $this->db->insert_batch('pesanan_has_detail', $arr);

            $this->db->where_in('id_user', [$this->id_akun, 0]);
            $this->db->update('keranjang', [
                'deleted' => date('Y-m-d H:i:s'),
            ]);
        }


        echo json_encode([
            'status' => 'success',
        ]);
    }
}
