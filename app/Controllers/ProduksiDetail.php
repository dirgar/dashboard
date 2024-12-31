<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProduksiDetailModel;

class ProduksiDetail extends BaseController
{
    protected $mdl;
    public function index()
    {
 
        $header['title']='Produksi Detail';

        echo view('dashboard',$header);
    }

}
