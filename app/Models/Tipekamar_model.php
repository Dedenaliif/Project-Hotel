<?php 
namespace App\Models;
use CodeIgniter\Model;
class Tipekamar_model extends Model
{
    Protected $db;
    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    function get_data()
    {      
      $data = $this->db->query('select * from tbl_tipekamar');      
      return $data->getResultArray();
    }

    function insertdata($data)
    {
        return $this->db->table('tbl_tipekamar')->insert($data);
    }

    function get_databyid($id)
    {
        $data = $this->db->query('select * from tbl_tipekamar where idkamar='.$id);
        return $data->getRow();
    }

    function updatedata($id,$data)
    {
        return $this->db->table('tbl_tipekamar')->update($data,array('idkamar'=>$id));
    }

    function hapusdata($id)
    {
        return $this->db->table('tbl_tipekamar')->delete(array('idkamar'=>$id));
    }
}