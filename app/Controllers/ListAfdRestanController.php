<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ListAfdRestanModel;

class ListAfdRestanController extends BaseController
{
    public function index()
    {
        $mdl = new ListAfdRestanModel;

        $result = $mdl->getListAfdRestan(false, false);

        return $this->response->setJSON($result,TRUE);
    }
}
