<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\RestanModel;

class RestanData extends BaseController
{
    protected $mdl;
    public function index($seg1 = false, $seg2 = false)
    {
        if ($seg1 == false && $seg2 == false){
            $tdate1 = date('m/d/Y', strtotime('-90 days', strtotime(date('m/d/Y'))));
            $tdate2 = date('m/d/Y', strtotime('-1 days', strtotime(date('m/d/Y'))));
        }else {
            $tdate1 = str_replace("-", "/", $seg1);
            $tdate2 = str_replace("-", "/", $seg2);
        }

        $data = $this->getRestanData($tdate1, $tdate2);

        return $this->response->setJSON($data);
    }

    public function getRestanData($tdate1, $tdate2)
    {

        $mdl = new RestanModel;

        if ($tdate1 != false)
        {
            $tdate1 = str_replace("-", "/", $tdate1);
            $tdate2 = str_replace("-", "/", $tdate2);

        }else {
            $tdate1 = date('m/d/Y', strtotime('-90 days', strtotime(date('m/d/Y'))));
            $tdate2 = date('m/d/Y', strtotime('-1 days', strtotime(date('m/d/Y'))));
        }

        $result = $mdl->getRestan($tdate1, $tdate2);

        return $result;
    }
}
