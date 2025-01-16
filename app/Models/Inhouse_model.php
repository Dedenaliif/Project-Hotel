<?php 
namespace App\Models;
use CodeIgniter\Model;
class Inhouse_model extends Model
{
    Protected $db;
    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    function inhouse_data()
    {
        return $this->db->query("SELECT c.id, t.nama, k.nokamar, c.checkin, DATE_ADD(checkin, INTERVAL duration DAY) AS checkout FROM tbl_checkin c
        left JOIN tbl_tamu t ON c.idtamu=t.id 
        LEFT JOIN tbl_kamar k ON c.idkamar=k.id
         WHERE STATUS=1")->getResult();
    }

    function checkout($data,$id)
    {
        return $this->db->table('tbl_checkin')->update($data,array('id'=>$id));
    }
}