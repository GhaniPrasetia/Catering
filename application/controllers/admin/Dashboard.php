<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'index' => 'admin/dashboard/index',
            'index_js' => 'admin/dashboard/index_js',
            'title' => 'Dashboard',
        ];

        $data['total_user'] = $this->db->query("SELECT count(1) as total from data_user where id != 1 and deleted is null ")->row()->total;
        $data['pesanan'] = $this->db->query("SELECT count(1) as total, 
        count(
            case when status='3' then 1 end
        ) as selesai,
        count(
            case when status in ('4','5') then 1 end
        ) as batal
        from pesanan where deleted is null ")->row();

        $grafik = $this->db->query("SELECT concat(
            MONTHNAME(a.created),' ',YEAR(a.created)
            ) as waktu, sum(b.sub_total) as total 
            from pesanan a 
            left join pesanan_has_detail b on b.id_pesanan=a.id and b.deleted is null
            where a.status='3' and a.deleted is null
            GROUP BY MONTH(a.created), YEAR(a.created)
        ")->result();

        $arr = [];
        foreach ($grafik as $key) {
            $arr[] = [
                'country' => $key->waktu,
                'value' => (int)$key->total,
            ];
        }

        $data['grafik'] = json_encode($arr);
        $this->templates->load($data);
    }

    public function session()
    {
        session();
    }
}

/* End of file Dashboard.php */
