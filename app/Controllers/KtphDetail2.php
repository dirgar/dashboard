<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\KtphDetail2Model;

class KtphDetail2 extends BaseController
{
    protected $mdl;
    public function index($tblock = false)
    {
        if ($tblock == false){
            $tblock = "D001";
        }

        $data = $this->getKtphDetail2Data($tblock);

        return $this->response->setJSON($data);
    }

    public function getKtphDetail2Data($tblock)
    {

        $mdl = new KtphDetail2Model;

        $result = $mdl->getKtphDetail2($tblock);

        return $result;
    }

}
