<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProduksiDetail2IndexModel;

class ProduksiDetail2Index extends BaseController
{
    protected $mdl;
    public function index()
    {
        $data = $this->getDetail2Index();

        return $this->response->setJSON($data);       
    }

    public function getDetail2Index()
    {

        $mdl = new ProduksiDetail2IndexModel;


        $result = $mdl->getDetail2IndexAfdelings();

        return $result;
    }
}
