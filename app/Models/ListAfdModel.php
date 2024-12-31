<?php

namespace App\Models;

use CodeIgniter\Model;

class ListAfdModel extends Model
{
    protected $table            = 'listafds';
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

    public function getListAfd() {      
        
        $sql = "SELECT DIVISIONCODE FROM FIELD_ALL ";
        $sql .= "WHERE (COMP,YEAR) in (SELECT COMP,MAX(YEAR) YEAR FROM FIELD_ALL GROUP BY COMP) ";
        $sql .= "AND COMP = 'SMG' ORDER BY estatecode, seq ";

        $row = $this->db->query($sql)->getResultArray();

            foreach ($row as $hsl){
                $dtafd = $hsl['DIVISIONCODE'];
                $data[] =array(
                        
                        "AFD" => $dtafd                     
                );
            }
            
        return $data; 
    } 

}
