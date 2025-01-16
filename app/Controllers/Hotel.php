<?php 
namespace App\Controllers;
use App\Models\Hotel_model;
use CodeIgniter\Controller;

class Hotel extends BaseController
{	
    Protected $hotel;
    public function __construct()
    {        
        $this->hotel = new Hotel_model();
    }

    public function index()
    {          
        $datahotel = $this->hotel->get_data();
        $data = array (
            'title' => 'Data Hotel',
            'action' => base_url('hotel/hotel_action'),
            'isi'=> 'hotel',
            'id' => $datahotel->id,
            'nama' => $datahotel->nama,
            'alamat' => $datahotel->alamat,
            'phone' => $datahotel->phone,
            'email' => $datahotel->email,
            'bintang' => $datahotel->bintang,
        );
        echo view('layout/wraper',$data);
    }

    public function hotel_action()
    {
        $idhotel = $this->request->getPost('id');        
        $data = array(
            'nama' => !empty($this->request->getPost('nama')) ? $this->request->getPost('nama') : NULL,
            'bintang' => !empty($this->request->getPost('bintang')) ? $this->request->getPost('bintang') : NULL,
            'alamat' => !empty($this->request->getPost('alamat')) ? $this->request->getPost('alamat') : NULL,
            'phone' => !empty($this->request->getPost('phone')) ? $this->request->getPost('phone') : NULL,
            'email' => !empty($this->request->getPost('email')) ? $this->request->getPost('email') : NULL,
        );
        $this->hotel->updatedata($idhotel,$data,);
        return redirect()->to(base_url('hotel'));
    }
}