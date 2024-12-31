<?php
namespace App\Controllers;

use CodeIgniter\HTTP\URI;

class Dashboard extends BaseController
{
    public function index()
    {
        $header['title']='Dashboard';
        //echo view('partial/header',$header);
        //echo view('partial/top_menu');
        //echo view('partial/side_menu');
        echo view('dashboard',$header);
        //echo view('partial/footer');
    }
}