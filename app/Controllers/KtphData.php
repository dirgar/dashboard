<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\KtphModel;

class KtphData extends BaseController
{
    protected $mdl;
    public function index($seg1 = false)
    {
        if ($seg1 == false){
            $seg1 = "AFD-I";
        }

        $data = $this->getKtphData($seg1);

        return $this->response->setJSON($data);
    }

    public function getKtphData($tafd)
    {

        $mdl = new KtphModel;

        $result = $mdl->getKtph($tafd);

        return $result;
    }
}
