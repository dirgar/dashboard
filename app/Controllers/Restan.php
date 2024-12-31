<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Restan extends BaseController
{
    public function index()
    {
        $header['title']='Restan';

        echo view('dashboard',$header);
    }
}
