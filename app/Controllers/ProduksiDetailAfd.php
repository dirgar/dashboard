<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProduksiDetailModel;

class ProduksiDetailAfd extends BaseController
{
    protected $mdl;
    public function index($seg1 = false, $seg2 = false)
    {
        $tdate = str_replace("-", "/", $seg1);

        $data = $this->getDetailAfd($tdate, $seg2);

        return $this->response->setJSON($data);
    }

    public function getDetailAfd($tdate, $tafd)
    {

        $mdl = new ProduksiDetailModel;


        $result = $mdl->getDetailAfdelings($tdate, $tafd);

        return $result;
    }
}
