<?php 
namespace App\Models;
use CodeIgniter\Model;
class Hotel_model extends Model
{
    Protected $db;
    public function __construct()
    {        
        $this->db = \Config\Database::connect();
    }

    function get_data()
    {      
      $data = $this->db->query('select * from tbl_hotel');      
      return $data->getRow();
    }

    function updatedata($id,$data)
    {
        return $this->db->table('tbl_hotel')->update($data,array('id'=>$id));
    }
}