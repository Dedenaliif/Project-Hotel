<?php 
namespace App\Models;
use CodeIgniter\Model;

class Penjualan_model extends Model
{
Protected $db;
    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    function get_data($periode)
    {
        return $this->db->query('SELECT t.namatipe, checkin, duration, price, duration*price AS nominal 
            FROM tbl_checkin c 
            LEFT JOIN tbl_kamar k ON c.idkamar=k.id
            LEFT JOIN tbl_tipekamar t ON k.idtipekamar=t.idkamar
            WHERE MONTH(checkin)=MONTH("'.$periode.'") AND YEAR(checkin)=year("'.$periode.'")
            ORDER BY t.namatipe')->getResultArray();
    }
}