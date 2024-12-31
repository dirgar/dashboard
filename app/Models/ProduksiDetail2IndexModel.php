<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiDetail2IndexModel extends Model
{
    protected $table            = 'produksidetail2indices';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getDetail2IndexAfdelings() {           

        $dtpanen = '
      
                    <div class="row p-2">
                        <div class="col-md-12">
                             <div class="callout callout-success bg-light">
                                <h4><strong class="text-success">Informasi</strong></h4>

                                <p class="text-lg">Silahkan pilih data pada kolom kiri untuk menampilkan data detail panen.</p>
                            </div>
                        </div>
                    </div>          
            ';
               
        $data[] = array(
                "DESC" => $dtpanen);
           

        return $data; 
    } 

}
