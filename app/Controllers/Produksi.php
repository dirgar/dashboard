<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produksi extends BaseController
{
    public function index()
    {
        $header['title']='Produksi';

        echo view('dashboard',$header);
    }
}
