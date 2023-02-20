<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-20 20:41:46 --> Severity: error --> Exception: Unable to locate the model you have specified: Table_pesanan /var/www/app/catering/system/core/Loader.php 348
ERROR - 2023-02-20 20:58:32 --> Query error: Unknown column 'harga' in 'field list' - Invalid query: INSERT INTO `pesanan` (`created`, `harga`, `id_menu`, `id_user`, `jenis`, `quantity`, `status`, `sub_total`) VALUES ('2023-02-20 20:58:32','38000','2','3','paketan','5','1','190000'), ('2023-02-20 20:58:32','5500','6','3','menu','2','1','11000'), ('2023-02-20 20:58:32','7000','7','3','menu','1','1','7000'), ('2023-02-20 20:58:32','15000','5','3','menu','3','1','45000')
ERROR - 2023-02-20 21:19:12 --> Query error: Unknown column 'a.id_user' in 'where clause' - Invalid query: SELECT
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
                a.id_user = '3' and a.deleted IS NULL and a.id_pesanan='1'
            ORDER BY
                a.id ASC
        
ERROR - 2023-02-20 21:19:16 --> Query error: Unknown column 'a.id_user' in 'where clause' - Invalid query: SELECT
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
                a.id_user = '3' and a.deleted IS NULL and a.id_pesanan='1'
            ORDER BY
                a.id ASC
        
ERROR - 2023-02-20 21:19:36 --> Severity: Notice --> Undefined variable: total /var/www/app/catering/application/views/user/pesanan/list.php 44
ERROR - 2023-02-20 21:52:06 --> Query error: Unknown column 'nukti_bayar' in 'field list' - Invalid query: UPDATE `pesanan` SET `status` = 2, `nukti_bayar` = 'uploads/bukti_tf/db7ef0543bfdb9e00c858b1b34d81e7f.jpeg', `updated` = '2023-02-20 21:52:20'
WHERE `id` = '1'
ERROR - 2023-02-20 21:52:11 --> Query error: Unknown column 'nukti_bayar' in 'field list' - Invalid query: UPDATE `pesanan` SET `status` = 2, `nukti_bayar` = 'uploads/bukti_tf/fe66bacb5a00f0ee9caaf98dc268b71c.jpeg', `updated` = '2023-02-20 21:52:20'
WHERE `id` = '1'
ERROR - 2023-02-20 22:24:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'all, 
        count(
            case when status='3' then 1 end
        ) as se' at line 1 - Invalid query: SELECT count(1) as all, 
        count(
            case when status='3' then 1 end
        ) as selesai,
        count(
            case when status in ('4','5') then 1 end
        ) as batal
        from pesanan where deleted is null 
ERROR - 2023-02-20 22:26:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'all, 
        count(
            case when status='3' then 1 end
        ) as se' at line 1 - Invalid query: SELECT count(1) as all, 
        count(
            case when status='3' then 1 end
        ) as selesai,
        count(
            case when status in ('4','5') then 1 end
        ) as batal
        from pesanan where deleted is null 
