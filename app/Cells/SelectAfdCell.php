<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class SelectAfdCell extends Cell
{
    protected $afd;

    public function listAfd(): string
    {
        $this->afd = model('listAfdModel')->getListAfd(false,false);
        /*$afd = model('listAfdModel')->getListAfd(false, false);
        foreach ($afd as $hsl){
            echo "<option>".$hsl['AFD']."</option>";
        }
            */
        return $afd;
    }
}
