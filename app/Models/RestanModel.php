<?php

namespace App\Models;

use CodeIgniter\Model;

class RestanModel extends Model
{
    protected $table            = 'restans';
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

    public function getRestan($tdate1, $tdate2) {           

        $sql = "SELECT A.SEQ, A.ESTATECODE ESTATECODE, A.DIVISIONCODE AFD, ";
        $sql .= "SUM(C.TOTAL_JANJANG_PANEN) TOTAL_JANJANG, ";
        $sql .= "SUM(C.BRONDOLAN) BRONDOLAN, ";
        $sql .= "SUM(C.BUAH_MASAK) BUAH_MASAK, ";
        $sql .= "SUM(C.BUAH_LEWAT_MASAK) LEWAT_MASAK, ";
        $sql .= "SUM(C.BUAH_MENTAH) BUAH_MENTAH ";
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

        $tdate1 = str_replace("/", "-", $tdate1);
        $tdate2 = str_replace("/", "-", $tdate2);

        $dturl = base_url('restandetail')."/";

            $i = 1;
            foreach ($row as $hsl){
                $dtstatecode = $hsl['ESTATECODE'];
                $dtafd = $hsl['AFD'];
                $dttotal_janjang = "<b>".number_format($hsl['TOTAL_JANJANG'],0,'.',',')."</b>";
                $dtbrondolan = "<b>".number_format($hsl['BRONDOLAN'],0,'.',',')."</b>";
                $dtbuah_masak = number_format($hsl['BUAH_MASAK'],0,'.',',');
                $dtlewat_masak = number_format($hsl['LEWAT_MASAK'],0,'.',',');
                $dtbuah_mentah = number_format($hsl['BUAH_MENTAH'],0,'.',',');
                
                $data[] =array(
                        "NO" => $i++, 
                        "ESTATECODE" => $hsl['ESTATECODE'],
                        "AFD" => "<a id='$dtafd' href='".$dturl.$dtafd."'>$dtafd</a>",
                        "TOTAL_JANJANG" => $dttotal_janjang,
                        "BRONDOLAN" => $dtbrondolan,
                        "BUAH_MASAK" => $dtbuah_masak,
                        "LEWAT_MASAK" => $dtlewat_masak,
                        "BUAH_MENTAH" => $dtbuah_mentah
                );
            }
        
        return $data; 
    }

}
