<?php 
namespace App\Controllers;
use App\Models\Tamu_model;
use CodeIgniter\Controller;
use App\Libraries\Datatables;

class Tamu extends BaseController
{	
    Protected $tamu;
    public function __construct()
    {                   
        $this->tamu = new Tamu_model();        
    }

    public function index()
    {                    
        $data = array (
            'title' => 'Data Tamu',          
            'isi'=> 'listtamu',
            'css' => '
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
            ',
            'js' => '
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
            ',
        );
        echo view('layout/wraper',$data);
    }

    public function ajaxloaddata()
    {               
        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        $search_value = $_REQUEST['search']['value'];
        
        if(!empty($search_value)){
            $total_count = $this->tamu->total_count($search_value);
            $data = $this->tamu->get_search($search_value,$start,$length);
        }
        else
        {   
            $total_count = $this->tamu->read_count();
            $data = $this->tamu->read_data($start,$length);               
        }
        
        $data1=array();
        foreach ($data as $ld)
        {
            $row=array(
                "nama"      => $ld->nama,
                "alamat"    => $ld->alamat,
                "phone"     => $ld->phone,
                "email"       => $ld->email,
                "action"       => "<a href='".Base_url('tamu/edit/'.$ld->id)."'><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i></button></a>
                <a href='".Base_url('tamu/history/'.$ld->id)."'><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-table'></i></button></a>",

            );            
            $data1[]=$row;
        }
        
        $json_data = array(                        
            "data" => $data1,
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "draw" => intval($params['draw']),
        );

        echo json_encode($json_data);
    }

    public function create()
    {        
        $data = array (
            'title'     => 'Input Data Tamu',
            'isi'       => 'formtamu',
            'action'    => 'create_action',
            'button'    => 'Simpan',
            'id'   => set_value('id'),
            'nama' => set_value('nama'),
            'alamat'  => set_value('aamat'),
            'phone'    => set_value('phone'),
            'email'    => set_value('email'),
        );
        echo view("layout/wraper",$data);
    }

    public function create_action()
    {
        $data = array(
            'nama' => !empty($this->request->getPost('nama')) ? $this->request->getPost('nama') : NULL,
            'alamat' => !empty($this->request->getPost('alamat')) ? $this->request->getPost('alamat') : NULL,
            'phone' => !empty($this->request->getPost('phone')) ? $this->request->getPost('phone') : NULL,
            'email' => !empty($this->request->getPost('email')) ? $this->request->getPost('email') : NULL,
        );        
        $this->tamu->insertdata($data);
        return redirect()->to(base_url('tamu'));
    }

    public function edit($id)
    {
        $datatamu = $this->tamu->get_databyid($id);        
        $data = array(
            'title'         => 'Edit Data Tamu',
            'isi'           => 'formtamu',
            'action'        => base_url('tamu/edit_action'),
            'button'        => 'Update',
            'js'            =>'
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.18.0/sweetalert2.all.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
            <script>
                    // delete
                    $(function() {
                        $(\'.delete\').on(\'click\', function(){
                            var delete_url = $(this).attr(\'data-url\');
                            swal({
                                title: \'Are you sure?\',
                                text: \'You wont be able to revert this!\',
                                type: \'warning\',
                                showCancelButton: true,
                                confirmButtonColor: \'#3085d6\',
                                cancelButtonColor: \'#d33\',
                                confirmButtonText: \'Yes, delete it!\',
                                cancelButtonText: \'No, cancel!\',
                                confirmButtonClass: \'btn btn-success\',
                                cancelButtonClass: \'btn btn-danger\',
                                buttonsStyling: false,
                                reverseButtons: true
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = delete_url;
                                }
                            });
                        });
                    });
                </script>
            ',                        
            'id'       => $id,
            'nama'     => $datatamu->nama,
            'alamat'      => $datatamu->alamat,
            'phone'        => $datatamu->phone,
            'email'        => $datatamu->email,
        );
        echo view("layout/wraper",$data);
    }

    public function edit_action()
    {
        $id = $this->request->getPost('id');    
        $data = array(
            'nama' => !empty($this->request->getPost('nama')) ? $this->request->getPost('nama') : NULL,
            'alamat' => !empty($this->request->getPost('alamat')) ? $this->request->getPost('alamat') : NULL,
            'email' => !empty($this->request->getPost('email')) ? $this->request->getPost('email') : NULL,
            'phone' => !empty($this->request->getPost('phone')) ? $this->request->getPost('phone') : NULL,
        );        
        $this->tamu->updatedata($id,$data);        
        return redirect()->to(base_url('tamu'));
    }

    public function delete($id) 
    {
        $this->tamu->hapusdata($id);
        return redirect()->to(base_url('tamu'));
    }

    public function history($idtamu)
    {
        $data = array (
            'title' => 'History Tamu',          
            'isi'=> 'historytamu',
            'css' => '
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
            ',
            'js' => '
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
            ',
            'datatamu' => $this->tamu->get_databyid($idtamu),
        );
        echo view('layout/wraper',$data);
    }

    public function ajaxhistory($idtamu)
    {                           
        $data = $this->tamu->total_historydata($idtamu);
        
        $json_data = array(     
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),                   
            "data" => $data,            
        );

        echo json_encode($json_data);
    }
}