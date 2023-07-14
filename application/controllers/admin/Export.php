<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

defined('BASEPATH') or exit('No direct script access allowed');

class Export extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function pesanan()
    {
        $data = $this->db->query("SELECT a.*, b.*, (
            CASE 
                when status='1' then 'pesanan masuk'
                when status='2' then 'pesanan diproses'
                when status='3' then 'pesanan selesai'
                when status='4' then 'pesanan batalkan user'
                when status='5' then 'pesanan dibatalkan admin'
            END
        ) as status
            from pesanan a 
            left join (SELECT id_pesanan, count(1) as total_produk, sum(sub_total) as total_nilai from pesanan_has_detail where deleted is null group by id_pesanan) b on b.id_pesanan=a.id
            where a.deleted is null
        ")->result();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Rekap Pesanan ' . tgl_indo(date('Y-m-d')));
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A1')->getFont()->setBold(true);

        $judul = [
            'NO', 'TANGGAL', 'STATUS', 'TOTAL PRODUK', 'NILAI'
        ];
        $alphabet = generateAlphabetArray($judul);

        foreach ($alphabet as $key => $value) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue($value . '3', $judul[$key]);
        }
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A3:E3')->getFont()->setBold(true);

        $awal = 4;
        $no = 1;
        foreach ($data as $row) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $awal, $no++)
                ->setCellValue('B' . $awal, tgl_indo($row->created, true))
                ->setCellValue('C' . $awal, $row->status)
                ->setCellValue('D' . $awal, $row->total_produk)
                ->setCellValue('E' . $awal, $row->total_nilai);
            $awal++;
        }
        $awal--;

        $spreadsheet->setActiveSheetIndex(0)->getStyle('A3:E' . $awal)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        foreach ($alphabet as $key => $value) {
            if (!in_array($value, ['A'])) $spreadsheet->setActiveSheetIndex(0)->getColumnDimension($value)->setAutoSize(true);
        }

        $spreadsheet->setActiveSheetIndex(0)->getStyle('C4:C' . $awal)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->setActiveSheetIndex(0)->getStyle('T4:X' . $awal)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Rekap_pesanan_' . date('d-m-Y H:i:s') . '.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
