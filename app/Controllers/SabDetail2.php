<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\SabDetail2Model;

class SabDetail2 extends BaseController
{
    protected $mdl;
    public function index($tsab)
    {
        $data = $this->getSabDetail2Data($tsab);

        return $this->response->setJSON($data);
    }
    
    public function getSabDetail2Data($tsab)
    {

        $mdl = new SabDetail2Model;


        $result = $mdl->getSabDetail2($tsab);

        return $result;
    }
}
