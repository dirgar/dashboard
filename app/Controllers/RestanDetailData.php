<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\RestanDetailModel;

class RestanDetailData extends BaseController
{
    protected $mdl;
    public function index($tafd)
    {
        $data = $this->getRestanDetailData($tafd);

        return $this->response->setJSON($data); 
    }

    public function getRestanDetailData($tafd)
    {

        $mdl = new RestanDetailModel;


        $result = $mdl->getRestanDetail($tafd);

        return $result;
    }

}
