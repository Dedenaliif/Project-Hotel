<?php 
namespace App\Models;
use CodeIgniter\Model;
class Checkin_model extends Model
{
    Protected $db;
    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    function get_listtamu()
    {
        $data = $this->query('select id, nama from tbl_tamu');
        return $data->getResultArray();
    }

    function get_listkamar()
    {
        $data = $this->query('SELECT k.id, k.nokamar FROM tbl_kamar k
        LEFT JOIN tbl_checkin c ON (k.id=c.idkamar) AND c.status=1
        WHERE ISNULL(c.id)');
        return $data->getResultArray();
    }

    function get_harga($idkamar)
    {
        $data = $this->query('select price from tbl_kamar where id='.$idkamar);
        return $data->getRow()->price;
    }

    function insertdata($data)
    {
        return $this->db->table('tbl_checkin')->insert($data);
    }
}