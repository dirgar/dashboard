<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiModel extends Model
{
    protected $table            = 'produksis';
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

    public function getAfdelings($tdate1, $tdate2) {           

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
        $sql .= "AND TO_CHAR (TO_DATE ('#TDATE2#', 'MM/DD/YYYY'), 'MMYYYY') = case when d.month = 12 then  ";
        $sql .= "lpad(1,2,'0')||(d.year+1) else lpad(d.month+1,2,'0')||d.year end ";
        $sql .= "and c.fieldcode = d.fieldcode ";
        $sql .= " #WHERE# ";
        //$sql .= "AND TO_DATE (C.TDATE, 'ddmmyyyy') between TO_DATE ('11/15/2024', 'MM/DD/YYYY') and TO_DATE ('11/15/2024', 'MM/DD/YYYY') ";
        $sql .= "GROUP BY  a.estatecode, A.DIVISIONCODE, a.seq ";
        $sql .= "order by a.estatecode,a.seq ";

            $where = " AND TO_DATE (C.TDATE, 'ddmmyyyy') between TO_DATE ('$tdate1', 'MM/DD/YYYY') and TO_DATE ('$tdate2', 'MM/DD/YYYY') ";

            $sql = str_replace("#WHERE#", $where, $sql);
            $sql = str_replace("#TDATE2#", $tdate2, $sql); 

        $row = $this->db->query($sql)->getResultArray();

        $tdate1 = str_replace("/", "-", $tdate1);
        $tdate2 = str_replace("/", "-", $tdate2);

        $dturl = base_url('produksidetail')."/$tdate2/";

            $i = 1;
            foreach ($row as $hsl){
                $dtafd = $hsl['AFD'];
                $dttotal_janjang = "<b>".number_format($hsl['TOTAL_JANJANG'],0,'.',',')."</b>";
                $dtbuah_masak = number_format($hsl['BUAH_MASAK'],0,'.',',');
                $dtlewat_masak = number_format($hsl['LEWAT_MASAK'],0,'.',',');
                $dtbuah_mentah = number_format($hsl['BUAH_MENTAH'],0,'.',',');
                $dtton =  number_format( $hsl['TON']/10000,1,'.',',');
                $dtbrondolan = "<b>".number_format($hsl['BRONDOLAN'],0,'.',',')."</b>";
                $dtpct_brd = number_format($hsl['PCT_BRD'],0,'.',',');
                $data[] =array(
                        "NO" => $i++, 
                        "ESTATECODE" => $hsl['ESTATECODE'],
                        "AFD" => "<a id='$dtafd' href='".$dturl.$dtafd."'>$dtafd</a>",
                        "TOTAL_JANJANG" => $dttotal_janjang,
                        "BRONDOLAN" => $dtbrondolan,
                        "BUAH_MASAK" => $dtbuah_masak,
                        "LEWAT_MASAK" => $dtlewat_masak,
                        "BUAH_MENTAH" => $dtbuah_mentah,
                        "TON" => $dtton,
                        "PCT_BRD" => $dtpct_brd
                );
            }
        
        return $data; 
    } 
}
