<?php

namespace App\Models;

use CodeIgniter\Model;

class SabModel extends Model
{
    protected $table            = 'sabs';
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

    public function getSab($tdate) {       

        $dtdate = str_replace("-", "/", $tdate);

        $sql = "SELECT SAB, TRIM(SOPIR) SOPIR, SUM(TOTAL_JANJANG_PANEN) TOTAL_JANJANG, ";
        $sql .= "SUM(BRONDOLAN) BRONDOLAN, ";
        $sql .="TKBM1, ";
        $sql .="TKBM2, ";
        $sql .="TKBM3, ";
        $sql .="TKBM4, ";
        $sql .="TKBM5 ";
        $sql .= "FROM V_MASTERANGKUT A, db_eharvesting.masterhasiledit B ";
        $sql .= "WHERE TO_DATE (TGLANGKUT, 'ddmmyyyy') = TO_DATE('$dtdate','MM/DD/YYYY') AND ";
        $sql .= "A.TPHCODE = B.TPHCODE ";
        $sql .= "AND A.TDATE = B.TDATE ";
        $sql .= "AND A.KARTU_PANEN = B.KARTU_PANEN ";
        $sql .="AND a.empcode = b.empcode ";
        $sql .="AND A.fieldcode = b.fieldcode ";
        $sql .= "GROUP BY SAB, TRIM(SOPIR), ";
        $sql .="TKBM1, ";
        $sql .="TKBM2, ";
        $sql .="TKBM3, ";
        $sql .="TKBM4, ";
        $sql .="TKBM5 ";
        $sql .= "ORDER BY SAB ";

        $row = $this->db->query($sql)->getResultArray();

            $i = 1;
            foreach ($row as $hsl){
                $dtsab = "<b>".$hsl['SAB']."</b>";
                $dtsopir = $hsl['SOPIR'];
                $dttotal_janjang = "<b>".number_format($hsl['TOTAL_JANJANG'],0,'.',',')."</b>";
                $dtbrondolan = "<b>".number_format($hsl['BRONDOLAN'],0,'.',',')."</b>";
                $dttkbm1 = $hsl['TKBM1'];
                $dttkbm2 = $hsl['TKBM2'];
                $dttkbm3 = $hsl['TKBM3'];
                $dttkbm4 = $hsl['TKBM4'];
                $dttkbm5 = $hsl['TKBM5'];
                
                $dtparam = base_url('sabdetail2/'.$hsl['SAB']);

                $data[] =array(
                        "NO" => $i++, 
                        "SAB" => $dtsab,
                        "SOPIR" => $dtsopir,
                        "TOTAL_JANJANG" => $dttotal_janjang,
                        "BRONDOLAN" => $dtbrondolan,
                        "TKBM1" => $dttkbm1,
                        "TKBM2" => $dttkbm2,
                        "TKBM3" => $dttkbm3,
                        "TKBM4" => $dttkbm4,
                        "TKBM5" => $dttkbm5,
                        "PARAM" => $dtparam
                );
            }
        
        return $data; 
    }

}
