<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\SabModel;

class SabData extends BaseController
{
    protected $mdl;
    public function index($seg1 = false)
    {
        if ($seg1 == false ){
            $tdate1 = date('m/d/Y', strtotime('-1 days', strtotime(date('m/d/Y'))));
        }else {
            $tdate1 = str_replace("-", "/", $seg1);
        }

        $data = $this->getSabData($tdate1);

        return $this->response->setJSON($data);
    }

    public function getSabData($tdate1)
    {

        $mdl = new SabModel;

        if ($tdate1 != false)
        {
            $tdate1 = str_replace("-", "/", $tdate1);

        }else {
            $tdate1 = date('m/d/Y', strtotime('-1 days', strtotime(date('m/d/Y'))));
        }

        $result = $mdl->getSab($tdate1);

        return $result;
    }
}
