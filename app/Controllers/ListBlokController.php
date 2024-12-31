<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ListBlokModel;

class ListBlokController extends BaseController
{
    public function index()
    {
        $mdl = new ListBlokModel;

        $result = $mdl->getListBloks();

        return $this->response->setJSON($result,TRUE);
    }

    public function listBlok($tafd)
    {
        $mdl = new ListBlokModel;

        $result = $mdl->getListBlok($tafd);

        return $this->response->setJSON($result,TRUE);
    }
}
