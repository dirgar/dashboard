<?php

namespace App\Models;

use CodeIgniter\Model;

class OrclModel extends Model
{
    protected $table            = 'orcls';
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

    protected $sql;

    public function getAfdeling($id = false) {           

        $sql = "SELECT  A.SEQ, ";
        $sql .= "A.ESTATECODE, ";
        $sql .= "A.DIVISIONCODE AFD, ";
        $sql .= "SUM (C.TOTAL_JANJANG_PANEN) TOTAL_JANJANG, ";
        $sql .= "SUM (C.BUAH_MASAK) BUAH_MASAK, ";
        $sql .= "SUM (C.BUAH_LEWAT_MASAK) LEWAT_MASAK, ";
        $sql .= "SUM (C.BUAH_MENTAH) BUAH_MENTAH, ";
        $sql .= "SUM (C.TOTAL_JANJANG_PANEN*BJR) TON, ";
        $sql .= "SUM (C.BRONDOLAN) BRONDOLAN, ";
        $sql .= " TO_CHAR(DECODE(SUM (C.TOTAL_JANJANG_PANEN*BJR),0,0,SUM (C.BRONDOLAN) / SUM (C.TOTAL_JANJANG_PANEN*BJR)) * 100,'99.99') PCT_BRD ";
        $sql .= "FROM   FIELD_ALL A, FIELDCROP B, MASTERHASILEDIT C,  ";
        $sql .= "AVERAGEBUNCHWEIGHT D ";
        $sql .= "WHERE   A.DIVISIONCODE = B.DIVISIONCODE AND b.fieldcode =  ";
        $sql .= "c.fieldcode AND comp = 'SMG' AND a.year = 2024 ";
        $sql .= "AND TO_CHAR (TO_DATE ('11/15/2024', 'MM/DD/YYYY'), 'MMYYYY') = case when d.month = 12 then  ";
        $sql .= "lpad(1,2,'0')||(d.year+1) else lpad(d.month+1,2,'0')||d.year end ";
        $sql .= "and c.fieldcode = d.fieldcode ";
        $sql .= "AND TO_DATE (C.TDATE, 'ddmmyyyy') between TO_DATE ('11/15/2024', 'MM/DD/YYYY') and TO_DATE ('11/15/2024', 'MM/DD/YYYY') ";
        $sql .= "GROUP BY  a.estatecode, A.DIVISIONCODE, a.seq ";
        $sql .= "order by a.estatecode,a.seq ";

        if ($id === false) {
            //return $this->db->query("SELECT STOCKGROUPCODE, DESCRIPTION, STORECODE FROM ITEM")->getResultArray(); 
            return $this->db->query($sql)->getResultArray(); 

        } else {
            return $this->db->query($sql)->getResultArray(); 
        }
    } 


}
