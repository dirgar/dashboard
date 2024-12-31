<?php

namespace App\Models;

use CodeIgniter\Model;

class ListAfdRestanModel extends Model
{
    protected $table            = 'listafdrestans';
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

    public function getListAfdRestan($tdate1 = false, $tdate2 = false ) {      
        
        if ($tdate1 == false && $tdate2 == false){
            $tdate1 = date('m/d/Y', strtotime('-90 days', strtotime(date('m/d/Y'))));
            $tdate2 = date('m/d/Y', strtotime('-1 days', strtotime(date('m/d/Y'))));
        }
        $tdate1 = str_replace("-", "/", $tdate1);
        $tdate2 = str_replace("-", "/", $tdate2);
        
        $sql = "SELECT A.SEQ, A.ESTATECODE ESTATECODE, A.DIVISIONCODE AFD ";
        $sql .= "FROM FIELD_ALL A, FIELDCROP B, db_eharvesting.MASTERHASILEDIT C ";
        $sql .= "WHERE A.DIVISIONCODE = B.DIVISIONCODE ";
        $sql .= "AND b.fieldcode = c.fieldcode ";
        $sql .= "AND comp= 'SMG' ";
        $sql .= "AND C.STANGKUT = 'FALSE' ";
        $sql .= "and year = 2024  #WHERE# ";
        $sql .= "GROUP BY a.estatecode,A.DIVISIONCODE, a.seq ";
        $sql .= "order by a.estatecode,a.seq ";

        $where = " AND TO_DATE (C.TDATE, 'ddmmyyyy') between TO_DATE ('$tdate1', 'MM/DD/YYYY') and TO_DATE ('$tdate2', 'MM/DD/YYYY') ";

        $sql = str_replace("#WHERE#", $where, $sql);

        $row = $this->db->query($sql)->getResultArray();

            foreach ($row as $hsl){
                $dtafd = $hsl['AFD'];
                $data[] =array(
                        
                        "AFD" => $dtafd                     
                );
            }
            
        return $data; 
    } 



}
