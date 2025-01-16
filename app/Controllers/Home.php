<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {   
                     
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'isi' => 'home'
        );
        echo view('layout/wraper',$data);
    }
}
