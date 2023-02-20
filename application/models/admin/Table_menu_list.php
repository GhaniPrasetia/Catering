<?php

class Table_menu_list extends CI_Model
{
    var $column_order = array(null, 'a.id_kategori', 'a.nama', 'a.harga', 'a.gambar', null); //field yang ada di table user
    var $column_search = array('a.nama', 'b.nama'); //field yang diizin untuk pencarian
    var $order = array('a.id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->select('a.*, b.nama as nm_kategori');
        $this->db->from('data_menu a');
        $this->db->join('ref_kategori b', 'b.id = a.id_kategori', 'left');
        $this->db->where('a.deleted', null);

        $i = 0;

        foreach ($this->column_search as $item) { // looping awal
            if ($_GET['search']['value']) { // jika datatable mengirimkan pencarian dengan metode POST

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_GET['search']['value']);
                } else {
                    $this->db->or_like($item, $_GET['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_GET['order'])) {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    function generate_table()
    {
        $list = $this->get_datatables();
        $data = array();
        $no = $_GET['start'];

        foreach ($list as $field) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $field->nm_kategori;
            $row[] = $field->nama;
            $row[] = rupiah($field->harga);
            $row[] = '
                <img src="' . base_url($field->gambar) . '" style="width:100px" class="img img-rounded">
            ';

            $row[] = '
                <a href="' . base_url('admin/menu/form/' . encode_id($field->id)) . '" class="btn btn-primary m-1 fw-600"><i class="fas fa-pencil-alt"></i> Ubah</a>
                <button onclick="hapus(\'' . encode_id($field->id) . '\');" type="button" class="btn btn-danger m-1 fw-600"><i class="fas fa-trash-alt"></i> Hapus</button>
            ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->count_all(),
            "recordsFiltered" => $this->count_filtered(),
            "data" => $data,
        );
        return json_encode($output);
    }
}
