<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Ktph extends BaseController
{
    public function index()
    {
        $header['title']='Kartu TPH';

        echo view('dashboard',$header);
    }
}
