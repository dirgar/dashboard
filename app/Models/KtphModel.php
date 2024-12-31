<?php

namespace App\Models;

use CodeIgniter\Model;

class KtphModel extends Model
{
    protected $table            = 'ktphs';
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

    public function getKtph($tafd) {       

        $sql = "SELECT BLOCKID, ESTATECODE FROM OPTPHMASTER ";
        $sql .= "WHERE DIVISIONCODE = '$tafd' AND INACTIVEDATE IS NULL ";
        $sql .= "GROUP BY BLOCKID, ESTATECODE ";

        $row = $this->db->query($sql)->getResultArray();

            $i = 1;
            foreach ($row as $hsl){
                $dtblokid = "<b>".$hsl['BLOCKID']."</b>";
                $dtestatecode = $hsl['ESTATECODE'];
                
                $dtparam = base_url('ktphdetail2/'.$hsl['BLOCKID']);

                $data[] =array(
                        "NO" => $i++, 
                        "BLOCKID" => $dtblokid,
                        "ESTATECODE" => $dtestatecode,
                        "PARAM" => $dtparam
                );
            }
        
        return $data; 
    }

}
