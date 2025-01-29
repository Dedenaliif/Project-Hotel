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
        $data = [
            'title' => 'Checkin',          
            'isi' => 'formcheckin',
            'action' => base_url('checkin/checkin_action'),
            'button' => 'Checkin',
            'listtamu' => $this->checkin->get_listtamu(),
            'listkamar' => $this->checkin->get_listkamar(),
            'css' => '
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
            ',
            'js' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
            <script>
                $(document).ready(function() {
                    $(".date").datepicker({
                        format: "dd-mm-yyyy",                    
                        autoclose: true
                    });

                    $("#idkamar").change(function() {
                        var idkamar = $(this).val();
                        if (idkamar) {
                            $.ajax({
                                url: "'.base_url('checkin/getharga').'/"+idkamar,
                                type: "GET",
                                success: function(data) {
                                    $("#price").val(data);
                                },
                                error: function() {
                                    alert("Gagal mengambil harga kamar.");
                                }
                            });
                        }
                    });
                });
            </script>',
        ];
        echo view('layout/wraper', $data);
    }

    // Mengambil harga kamar berdasarkan ID kamar
    public function getharga($idkamar)
    {
        $harga = $this->checkin->get_harga($idkamar);
        echo $harga ? $harga : 0;
    }

    // Proses Check-in
    public function checkin_action()
    {
        // Ambil data dari form
        $checkin_raw = $this->request->getPost('checkin');
        $checkin_date = $this->tanggal($checkin_raw); // Konversi ke format Y-m-d

        // Debugging: Cek apakah input benar
        if (empty($checkin_raw)) {
            session()->setFlashdata("error", "Tanggal check-in tidak boleh kosong.");
            return redirect()->to(base_url('checkin'))->withInput();
        }

        if ($checkin_date === null) {
            session()->setFlashdata("error", "Format tanggal tidak valid.");
            return redirect()->to(base_url('checkin'))->withInput();
        }

        // Simpan ke database
        $data = [
            'checkin' => $checkin_date,
            'idkamar' => $this->request->getPost('idkamar'),
            'idtamu' => $this->request->getPost('idtamu'),
            'duration' => $this->request->getPost('duration'),
            'status' => '1'
        ];

        $this->checkin->insertdata($data);
        session()->setFlashdata("success", "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('inhouse'));
    }

    
    private function tanggal($tgl)
    {
        if (empty($tgl)) {
            return null; 
        }

        $date = date_create_from_format('d-m-Y', $tgl);
        return $date ? $date->format('Y-m-d') : null;
    }
}
