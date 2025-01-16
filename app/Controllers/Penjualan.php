<?php 
namespace App\Controllers;
use App\Models\penjualan_model;
use CodeIgniter\Controller;
use App\Libraries\Datatables;

class Penjualan extends BaseController
{	
    Protected $pejualan;
    Protected $dompdf;
    public function __construct()
    {                   
        $this->penjualan = new Penjualan_model();               
    }

    public function index()
    {
        if (empty($this->request->getPost('periode')))
        {
            $periode=date('Y-m-d');
        }
        else
        {
            $periode="01-".$this->request->getPost('periode');
            $periode=$this->tanggal($periode);
        }
        
        $data = array(
            'title'         => 'Laporan Penjualan',
'isi'           => 'lappenjualan',
            'periode'       => $periode,
            'css' => '
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
            ',
            'js' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
            <script>
            $(".date").datepicker({
                format: "mm-yyyy",
                startView: "months", 
                minViewMode: "months",                    
                autoClose: true
            });
            </script>',
            'datapenjualan' => $this->penjualan->get_data($periode),
        );

        echo view('layout/wraper',$data);
    }

    public function reppdf($periode)
    {
        $dompdf = new \Dompdf\Dompdf();        
        $datapenjualan = $this->penjualan->get_data($periode);
        $dompdf->loadHtml(view('penjualanpdf', ["datapenjualan" => $datapenjualan, "title"=>"Laporan Penjualan",]));
        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("laporanpenjualan"); //nama file pdf
    }

    function tanggal($tgl)
    {
        return substr($tgl,6,4).'-'.substr($tgl,3,2).'-'.substr($tgl,0,2);
    }
}