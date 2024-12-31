<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Sab extends BaseController
{
    public function index()
    {
        $header['title']='Surat Angkut Buah';

        echo view('dashboard',$header);
    }
}
