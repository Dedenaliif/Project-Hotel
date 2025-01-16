<?php 
namespace App\Models;
use CodeIgniter\Model;
class Tamu_model extends Model
{
    Protected $db;
    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    function get_data()
    {      
      $data = $this->db->query('select id, nama, alamat, email, phone from tbl_tamu');      
      return $data->getResultArray();
    }

    function insertdata($data)
    {
        return $this->db->table('tbl_tamu')->insert($data);
    }

    function get_databyid($id)
    {
        $data = $this->query('select * from tbl_tamu where id='.$id);
        return $data->getRow();
    }

    function updatedata($id,$data)
    {
        return $this->db->table('tbl_tamu')->update($data,array('id'=>$id));
    }

    function hapusdata($id)
    {
        return $this->db->table('tbl_tamu')->delete(array('id'=>$id));
    }

    function total_count($search_value)
    {
        return $this->db->query("SELECT id, nama, alamat, phone, email from tbl_tamu        
        WHERE id like '%".$search_value."%' OR nama like '%".$search_value."%' OR alamat like '%".$search_value."%' OR phone like '%".$search_value."%' or email like '%".$search_value."%'")->getResult();
    }

    function get_search($search_value,$start,$length)
    {
        return $this->db->query("SELECT id, nama, alamat, phone, email from tbl_tamu
        WHERE id like '%".$search_value."%' OR nama like '%".$search_value."%' OR alamat like '%".$search_value."%' OR phone like '%".$search_value."%' or email like '%".$search_value."%' limit $start, $length")->getResult();
    }

    function read_count()
    {
        return $this->db->query("SELECT id, nama, alamat, phone, email from tbl_tamu")->getResult();
    }

    function read_data($start,$length)
    {
        return $this->db->query("SELECT * from tbl_tamu
        limit $start, $length")->getResult();
    }

    function total_historydata($idtamu)
    {
        return $this->db->query("SELECT c.checkin, c.duration, t.nama, tk.namatipe, k.nokamar FROM tbl_checkin c LEFT JOIN tbl_tamu t ON c.idtamu=t.id
        LEFT JOIN tbl_kamar k ON c.idkamar=k.id LEFT JOIN tbl_tipekamar tk ON k.idtipekamar=tk.idkamar WHERE idtamu=".$idtamu)->getResultArray();
    }
}