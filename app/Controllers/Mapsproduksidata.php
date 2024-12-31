<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\MapsProduksiModel;

class Mapsproduksidata extends BaseController
{
    protected $mdl;

    public function index()
    {
        $mdl = new MapsProduksiModel;

        $header['json'] = $this->getMapsIndex();
        
        //return $this->response->setJSON($data);
        echo view('maps/produksi/mapsMainBody',$header);
    }

    public function getMapsMarkerData($tafd, $tdate)
    {
        $mdl = new MapsProduksiModel;
        
        $data = $mdl->getMapsMarkers($tafd, $tdate);

        return $this->response->setJSON($data);
        //echo $data;
    }
}
