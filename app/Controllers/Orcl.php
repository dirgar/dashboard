<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\OrclModel;

class Orcl extends BaseController
{
    protected $mdl;
    public function index()
    {
        $mdl = new OrclModel;

        $gridRow= $mdl->getAfdeling();
        $gridTotal = count($gridRow);

        $grid = ['rows' => $gridRow];

        //$data['orcldata'] = $grid;
        //echo view('produksi/getProductionView.php',$data);

        return $this->response->setJSON($mdl->getAfdeling());

    }

    public function getAfdeling()
    {
        $mdl = new OrclModel;

        $gridRow= $mdl->getAfdeling();
        $gridTotal = count($gridRow);

        $grid = ['rows' => $gridRow];

        //$data['orcldata'] = $grid;
        //echo view('produksi/getProductionView.php',$data);

        return $this->response->setJSON($mdl->getAfdeling());

    }

}
