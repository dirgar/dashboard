<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\MapsProduksiModel;

class MapsProduksi extends BaseController
{
    protected $mdl;
    public function index()
    {
        $mdl = new MapsProduksiModel;

        //$header['json'] = $mdl->getMapsIndex();

        $header['title']='Peta Produksi';

        echo view('dashboard',$header);
    }
}
