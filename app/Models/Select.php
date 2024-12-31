<?php

namespace App\Models;

use CodeIgniter\Model;

class Select extends Model
{
    protected $table            = 'selects';
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


    public function getselectafd($tdate) {           

        $sql = "SELECT B.DIVISIONCODE AFD";
        $sql .= "FROM MASTERHASILEDIT A, FIELDCROP B ";
        $sql .= "WHERE B.FIELDCODE = A.FIELDCODE #WHERE# ";
        $sql .= "GROUP BY A.FIELDCODE, A.TDATE ";

        $where = " AND TO_DATE (A.TDATE, 'ddmmyyyy') = TO_DATE('$tdate', 'MM/DD/YYYY') ";

        $sql = str_replace("#WHERE#", $where, $sql);

        $row = $this->db->query($sql)->getResultArray();
            
            $i = 1;
            foreach ($row as $hsl){
                $dtafd = $hsl['AFD'];
                
                $data[] =array(
                        "AFD" => $dtafd
                );
            }
        
        return $data; 
    } 



}
