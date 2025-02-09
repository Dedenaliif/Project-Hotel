<?php 
namespace App\Controllers;
use App\Models\Tipekamar_model;
use CodeIgniter\Controller;
use App\Libraries\Datatables;

class Tipekamar extends BaseController
{	
    Protected $kamar;
    Protected $db;
    public function __construct()
    {                   
        $this->kamar = new Tipekamar_model();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {                           
        $data = array (
          'title' => 'Data Tipe kamar',          
          'isi'=> 'listtipekamar',
        );
        // session()->setFlashdata("success", "This is success message");
        echo view('layout/wraper',$data);
    }

    public function ajaxloaddata()
    {        
        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        $search_value = $_REQUEST['search']['value'];
        //$data=array();
        if(!empty($search_value)){
            $total_count = $this->db->query("SELECT * from tbl_tipekamar WHERE idkamar like '%".$search_value."%' OR kodekamar like '%".$search_value."%' OR namatipe like '%".$search_value."%' OR ukuran like '%".$search_value."%'")->getResult();
            $data = $this->db->query("SELECT * from tbl_tipekamar WHERE idkamar like '%".$search_value."%' OR kodekamar like '%".$search_value."%' OR namatipe like '%".$search_value."%' OR ukuran like '%".$search_value."%' limit $start, $length")->getResult();
        }
        else
        {   
            $total_count = $this->db->query("SELECT * from tbl_tipekamar")->getResult();
            $data = $this->db->query("SELECT * from tbl_tipekamar limit $start, $length")->getResult();               
        }
        
        $data1=array();
        foreach ($data as $ld)
        {
            $row=array(
                "idkamar"      => $ld->idkamar,
                "kodekamar"    => $ld->kodekamar,
                "namatipe"     => $ld->namatipe,
                "ukuran"       => $ld->ukuran,
                "action"       => "<a href='".Base_url('tipekamar/edit/'.$ld->idkamar)."'><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i></button></a>",

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
            'title'     => 'Input Data Tipe Kamar',
            'isi'       => 'formtipekamar',
            'action'    => 'create_action',
            'button'    => 'Simpan',
            'idkamar'   => set_value('idkamar'),
            'kodekamar' => set_value('kodekamar'),
            'namatipe'  => set_value('namatipe'),
            'ukuran'    => set_value('ukuran'),
        );
        echo view("layout/wraper",$data);
    }

    public function create_action()
    {
        $data = array(
            'kodekamar' => !empty($this->request->getPost('kodekamar')) ? $this->request->getPost('kodekamar') : NULL,
            'namatipe' => !empty($this->request->getPost('namatipe')) ? $this->request->getPost('namatipe') : NULL,
            'ukuran' => !empty($this->request->getPost('ukuran')) ? $this->request->getPost('ukuran') : NULL,
        );        
        $this->kamar->insertdata($data);
        session()->setFlashdata("success", "Tipe Kamar Berhasil Ditambahkan");
        return redirect()->to(base_url('tipekamar'));
    
    }

    public function edit($id)
    {
        $datakamar = $this->kamar->get_databyid($id);        
        $data = array(
            'title'         => 'Edit Data Tipe Kamar',
            'isi'           => 'formtipekamar',
            'action'        => base_url('tipekamar/edit_action'),
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
            'idkamar'       => $id,
            'kodekamar'     => $datakamar->kodekamar,
            'namatipe'      => $datakamar->namatipe,
            'ukuran'        => $datakamar->ukuran,
        );
        // session()->setFlashdata("success", "This is success message");
        echo view("layout/wraper",$data);
    }

    public function edit_action()
    {
        $idkamar = $this->request->getPost('idkamar');       
        $data = array(
            'kodekamar' => !empty($this->request->getPost('kodekamar')) ? $this->request->getPost('kodekamar') : NULL,
            'namatipe' => !empty($this->request->getPost('namatipe')) ? $this->request->getPost('namatipe') : NULL,
            'ukuran' => !empty($this->request->getPost('ukuran')) ? $this->request->getPost('ukuran') : NULL,
        );        
        $this->kamar->updatedata($idkamar,$data);
        session()->setFlashdata("success", "Tipe Kamar Berhasil Diupdate");        
        return redirect()->to(base_url('tipekamar'));
    }

    public function delete($id) 
    {
        $this->kamar->hapusdata($id);
        session()->setFlashdata("success", "Tipe Kamar Berhasil Dihapus");
        return redirect()->to(base_url('tipekamar'));
    }
}