<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RestanDetail extends BaseController
{
    public function index()
    {
        $header['title']='Restan Detail';

        echo view('dashboard',$header);
    }
}
