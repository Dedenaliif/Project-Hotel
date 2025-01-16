<?php 
namespace App\Controllers;
use App\Models\Login_model;
use CodeIgniter\Controller;

class Login extends BaseController
{	
    Protected $login;
    public function __construct()
    {                   
        $this->login = new Login_model();        
    }

    public function index()
    {
        $data = array(
            'title'    => 'Login',
            'action'    => base_url('login/login_action'),
        );
        echo view('login',$data);
    }

    function login_action()
    {
        $username = $this->request->getPost('username');
        $pass = $this->request->getPost('password');

        $password = hash("sha512",sha1(md5(sha1(md5($pass)))));

        if ($data=$this->login->loginprocces($username,$password))
        {
            $session = session();
            $ses_data = [
                'username'       => $data->username,
                'nama_lengkap'     => $data->nama_lengkap,                
                'logged'     => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to(base_url('home'));
        }
        else {
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}