<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProduksiDetail2ModalModel;

class ProduksiDetail2Modal extends BaseController
{
    protected $mdl;
    public function index($seg1 = false, $seg2 = false)
    {
        $tdate = str_replace("-", "/", $seg1);

        $data['hsl'] = $this->getDetail2Modal($tdate, $seg2);

        //return $this->response->setJSON($data);  
        echo view('produksidetail/produksiDetail2Modal', $data);
    }

    public function getDetail2Modal($tdate, $ttph)
    {

        $mdl = new ProduksiDetail2ModalModel;


        $result = $mdl->getDetail2Modals($tdate, $ttph);

        return $result;
    }
}
