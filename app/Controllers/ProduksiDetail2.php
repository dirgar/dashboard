<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProduksiDetail2Model;

class ProduksiDetail2 extends BaseController
{
    protected $mdl;
    public function index($tdate, $tafd)
    {
        $tdate = str_replace("-", "/", $tdate);

        $data = $this->getDetail2($tdate, $tafd);

        return $this->response->setJSON($data);   
           
    }

    public function getDetail2($tdate, $tafd)
    {

        $mdl = new ProduksiDetail2Model;


        $result = $mdl->getDetail2Afdelings($tdate, $tafd);

        return $result;
    }

}
