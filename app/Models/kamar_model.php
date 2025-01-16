<?php 
namespace App\Models;
use CodeIgniter\Model;
class Kamar_model extends Model
{
    Protected $db;
    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    function get_data()
    {      
      $data = $this->db->query('select no_kamar, namatipe, price, allotment from tbl_kamar k
                left join tbl_tipekamar t on k.idtipekamar=t.idkamar');      
      return $data->getResultArray();
    }

    function get_tipekamar()
    {
        $data = $this->db->query("select idkamar, namatipe from tbl_tipekamar");
        return $data->getResultArray();
    }

    function insertdata($data)
    {
        return $this->db->table('tbl_kamar')->insert($data);
    }

    function get_databyid($id)
    {
        $data = $this->query('select * from tbl_kamar where id='.$id);
        return $data->getRow();
    }

    function updatedata($id,$data)
    {
        return $this->db->table('tbl_kamar')->update($data,array('id'=>$id));
    }

    function hapusdata($id)
    {
        return $this->db->table('tbl_kamar')->delete(array('id'=>$id));
    }
}