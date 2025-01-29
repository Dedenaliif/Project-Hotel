<?php

namespace App\Controllers;

use App\Models\Tamu_model;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {   
        $this->db = \Config\Database::connect();          
        
    }

    public function index()
{
    $data = array(
        'title' => 'Home',
        'isi' => 'home'
    );

    // Query data kamar dan tamu
    $kamar = $this->db->query('SELECT * FROM tbl_kamar');
    $tamu = $this->db->query('SELECT * FROM tbl_tamu');

    // Menghitung jumlah kamar dan tamu
    $countkamar = $kamar->getNumRows();
    $counttamu = $tamu->getNumRows();

    // Query total pendapatan berdasarkan data checkin (duration * price)
    $pendapatanQuery = $this->db->query("
        SELECT SUM(tbl_checkin.duration * tbl_kamar.price) AS total_pendapatan 
        FROM tbl_checkin 
        INNER JOIN tbl_kamar ON tbl_checkin.idkamar = tbl_kamar.id
    ");
    $pendapatanResult = $pendapatanQuery->getRow(); // Mengambil baris pertama hasil query
    $totalPendapatan = $pendapatanResult->total_pendapatan ?? 0; // Jika null, set ke 0

    // Tambahkan jumlah data kamar, tamu, dan pendapatan ke $data
    $data['countkamar'] = $countkamar;
    $data['counttamu'] = $counttamu;
    $data['totalpendapatan'] = $totalPendapatan;

    // Tampilkan data ke dalam view
    echo view('layout/wraper', $data);
}


}
