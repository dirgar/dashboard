<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\RestanDetail2Model;

class RestanDetail2 extends BaseController
{
    protected $mdl;
    public function index($tdate, $tafd)
    {
        //$tdate = str_replace("-", "/", $tdate);

        $data = $this->getRestanDetail2Data($tdate, $tafd);

        return $this->response->setJSON($data);  
    }

    public function getRestanDetail2Data($tdate, $tafd)
    {

        $mdl = new RestanDetail2Model;


        $result = $mdl->getRestanDetail2($tdate, $tafd);

        return $result;
    }
}
