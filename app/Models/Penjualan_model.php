<?php 
namespace App\Models;
use CodeIgniter\Model;

class Penjualan_model extends Model
{
    protected $db;

    public function __construct()
    {                
        $this->db = \Config\Database::connect();
    }

    public function get_data($periode)
    {
        // Mengonversi periode menjadi format yang dapat dipahami oleh query
        $bulan = date('m', strtotime($periode));
        $tahun = date('Y', strtotime($periode));

        // Menggunakan query builder untuk mengambil data sesuai bulan dan tahun dari periode yang diberikan
        return $this->db->query('
            SELECT t.namatipe, c.checkin, c.duration, k.price, c.duration * k.price AS nominal
            FROM tbl_checkin c
            LEFT JOIN tbl_kamar k ON c.idkamar = k.id
            LEFT JOIN tbl_tipekamar t ON k.idtipekamar = t.idkamar
            WHERE MONTH(c.checkin) = ? AND YEAR(c.checkin) = ?
            ORDER BY t.namatipe', [$bulan, $tahun])
            ->getResultArray();
    }
}
