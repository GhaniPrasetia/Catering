<?php

function data_sistem($get = 'nama')
{
    $data = [
        'nama' => 'Sistem Informasi Catering',
        'deskripsi' => 'melayani berbagai macam jenis catering',
    ];

    return $data[$get];
}

function get_detail_pesanan($id_pesanan)
{
    $CI = &get_instance();

    $data['all'] = $CI->db->query("SELECT
                a.*,
                
                case when a.jenis='menu' then b.nama 
                when a.jenis='paketan' then c.nama 
                end as nama_menu,
                
                case when a.jenis='menu' then b.harga
                when a.jenis='paketan' then c.harga 
                end as harga_menu
            FROM
                pesanan_has_detail a 
                left join data_menu b on b.id=a.id_menu
                left join paketan c on c.id=a.id_menu
            WHERE
                a.deleted IS NULL and a.id_pesanan='$id_pesanan'
            ORDER BY
                a.id ASC
        ")->result();

    $data['total'] = $CI->db->query("SELECT
                sum(
                    a.quantity *
                    (case when a.jenis='menu' then b.harga 
                    when a.jenis='paketan' then c.harga end)
                ) as total
            FROM
                pesanan_has_detail a 
                left join data_menu b on b.id=a.id_menu
                left join paketan c on c.id=a.id_menu
            WHERE
                a.deleted IS NULL and a.id_pesanan='$id_pesanan'
        ")->row()->total;

    return $data;
}
