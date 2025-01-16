<?php 
namespace App\Controllers;
use App\Models\Checkin_model;
use CodeIgniter\Controller;
use App\Libraries\Datatables;

class Checkin extends BaseController
{	
    Protected $checkin;
    public function __construct()
    {                   
        $this->checkin = new Checkin_model();        
    }

    public function index()
    {                    
        $data = array (
            'title' => 'Checkin',          
            'isi'=> 'formcheckin',
            'action' => base_url('checkin/checkin_action'),
            'button' => 'Checkin',
            'listtamu' => $this->checkin->get_listtamu(),
            'listkamar' => $this->checkin->get_listkamar(),
            'css' => '
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
            ',
            'js' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
            <script>
                $(".date").datepicker({
                format: "dd-mm-yyyy",                    
                autoClose: true
                });

                function checkrate()
                {
                    idkamar=$("select[name=idkamar] option").filter(":selected").val()                    
                    $.ajax({
                        url : "'.base_url('checkin/getharga').'/"+idkamar,
                        type: "post",
                        data: {},
                        success: function(data) {
                            $("#price").val(data);
                        }
                    });
                }
            </script>',
        );
        echo view('layout/wraper',$data);
    }

function getharga($idkamar)
{
    $harga = $this->checkin->get_harga($idkamar);
    echo $harga;
}

    function checkin_action()
    {
        $data = array(
        'checkin' => $this->tanggal($this->request->getPost('checkin')),
        'idkamar' => $this->request->getPost('idkamar'),
        'idtamu' => $this->request->getPost('idtamu'),
        'duration' => $this->request->getPost('duration'),
        'status' => '1'
        );
        $this->checkin->insertdata($data);
        return redirect()->to(base_url('tamu'));
    }

    function tanggal($tgl)
    {
        return substr($tgl,6,4).'-'.substr($tgl,3,2).'-'.substr($tgl,0,2);
    }

}