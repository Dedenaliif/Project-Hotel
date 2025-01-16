<?php 
namespace App\Models;
use CodeIgniter\Model;
class Login_model extends Model
{
    Protected $db;
    public function __construct()
    {        
        $this->db = \Config\Database::connect();
    }

    function loginprocces($username,$password)
    {
        return $this->db->query('select username,nama_lengkap from tbl_user where username="'.$username.'" and password="'.$password.'" and aktif="Y"')->getRow();        
    }
}
