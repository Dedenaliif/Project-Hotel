<?php
namespace App\Controllers;
use App\Models\Inhouse_model;
use CodeIgniter\Controller;
use App\Libraries\Datatables;

class Inhouse extends BaseController
{	
    Protected $inhouse;
    public function __construct()
    {                   
        $this->inhouse = new Inhouse_model();
    }

    public function index()
    {                    
        $data = array (
            'title' => 'Data Tamu Inhouse',          
            'isi'=> 'listinhouse.php',
            'css' => '
            <link rel="stylesheet" type="text/css" href="'.base_url('public/asset/css/datatables.min.css').'"/>
            ',
            'js' => '
            <script type="text/javascript" src="'.base_url('public/asset/js/datatables.min.js').'"></script>
            ',
        );
        echo view('layout/wraper',$data);
    }

    public function ajaxloaddata()
    {                           
        $data = $this->inhouse->inhouse_data();

        $data1=array();
        foreach ($data as $ld)
        {
            $row=array(
                "nama"      => $ld->nama,
                "nokamar"    => $ld->nokamar,
                "checkin"     => $ld->checkin,
                "checkout"       => $ld->checkout,
                "action"       => "<a href='".Base_url('inhouse/checkout/'.$ld->id)."'><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-check'></i> checkout</button></a>",

            );            
            $data1[]=$row;
        }
        
        $json_data = array(                        
            "data" => $data1,   
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),         
        );

        echo json_encode($json_data);
    }

    function checkout($id)
    {
        $data = array(
            'status' => 2
        );
        $this->inhouse->checkout($data,$id);
        return redirect()->to(base_url('inhouse'));
    }
}