<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ListAfdModel;

class ListAfdController extends BaseController
{
    public function index()
    {
        $mdl = new ListAfdModel;

        $result = $mdl->getListAfd();

        return $this->response->setJSON($result,TRUE);
        //return print_r($result);
    }
}
