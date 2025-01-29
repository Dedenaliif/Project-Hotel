<?php 
namespace App\Controllers;
use App\Models\Penjualan_model;
use CodeIgniter\Controller;

class Penjualan extends BaseController
{   
    protected $penjualan;

    public function __construct()
    {                   
        $this->penjualan = new Penjualan_model();               
    }

    public function index()
    {
        if (empty($this->request->getPost('periode'))) {
            $periode = date('Y-m-d');  // Tanggal default adalah hari ini
        } else {
            $periode = $this->formatTanggal($this->request->getPost('periode'));
        }


        $data = array(
            'title'         => 'Laporan Penjualan',
            'isi'           => 'lappenjualan',
            'periode'       => $periode,
            'datapenjualan' => $this->penjualan->get_data($periode),
        );

        echo view('layout/wraper', $data);
    }


    public function reppdf($periode)
    {
        $dompdf = new \Dompdf\Dompdf();        
        $datapenjualan = $this->penjualan->get_data($periode);
        $dompdf->loadHtml(view('penjualanpdf', ["datapenjualan" => $datapenjualan, "title" => "Laporan Penjualan",]));
        $dompdf->setPaper('A4', 'portrait');  // Ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("laporanpenjualan.pdf"); // Nama file PDF
    }

    // Fungsi untuk mengubah format tanggal menjadi Y-m-d
    function formatTanggal($tgl)
    {
        return substr($tgl, 6, 4) . '-' . substr($tgl, 3, 2) . '-' . substr($tgl, 0, 2);
    }
}
