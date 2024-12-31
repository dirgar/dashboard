<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiDetailModel extends Model
{
    protected $table            = 'produksidetails';
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

    public function getDetailAfdelings($tdate, $tafd) {           

        $sql = "SELECT A.TDATE, A.FIELDCODE, SUM(TOTAL_JANJANG_PANEN) TOTAL_JANJANG, ";
        $sql .= "SUM(BUAH_MASAK) BUAH_MASAK, SUM(BUAH_MENTAH) BUAH_MENTAH, ";
        $sql .= "SUM(BUAH_LEWAT_MASAK) BUAH_LEWAT_MASAK, SUM(BUAH_BUSUK) BUAH_BUSUK, ";
        $sql .= "SUM(TANDAN_KOSONG) TANDAN_KOSONG, SUM(TANGKAI_PANJANG) TANGKAI_PANJANG, ";
        $sql .= "SUM(KOTORAN) KOTORAN, SUM(ABNORMAL) ABNORMAL, ";
        $sql .= "SUM(BRONDOLAN) BRONDOLAN ";
        $sql .= "FROM MASTERHASILEDIT A, FIELDCROP B ";
        $sql .= "WHERE B.FIELDCODE = A.FIELDCODE #WHERE# ";
        $sql .= "GROUP BY A.FIELDCODE, A.TDATE ";


        $where = " AND B.DIVISIONCODE = '$tafd' AND TO_DATE (A.TDATE, 'ddmmyyyy') = TO_DATE('$tdate', 'MM/DD/YYYY') ";

        $sql = str_replace("#WHERE#", $where, $sql);

        $row = $this->db->query($sql)->getResultArray();
            
            $i = 1;
            foreach ($row as $hsl){
                $dtblok = "<b>".$hsl['FIELDCODE']."</b>";
                $dttotal_janjang = number_format($hsl['TOTAL_JANJANG'],0,'.',',');
                $dtbrondolan = number_format($hsl['BRONDOLAN'],0,'.',',');
                $dtbuah_masak = number_format($hsl['BUAH_MASAK'],0,'.',',');
                $dtbuah_lewat_masak = number_format($hsl['BUAH_LEWAT_MASAK'],0,'.',',');
                $dtbuah_busuk = number_format($hsl['BUAH_BUSUK'],0,'.',',');
                $dttandan_kosong = number_format($hsl['TANDAN_KOSONG'],0,'.',',');
                $dttangkai_panjang = number_format($hsl['TANGKAI_PANJANG'],0,'.',',');
                $dtkotoran = number_format($hsl['KOTORAN'],0,'.',',');
                $dtabnormal = number_format($hsl['ABNORMAL'],0,'.',',');

                $tdate1 = str_replace("/", "-", $tdate);
                
                $dtparam = $tdate1."/".$hsl['FIELDCODE'];

                $data['rows'][] =array(
                        "NO" => $i++, 
                        "BLOK" => $dtblok,
                        "TOTAL_JANJANG" => $dttotal_janjang,
                        "BRONDOLAN" => $dtbrondolan,
                        "BUAH_MASAK" => $dtbuah_masak,
                        "PARAM" => $dtparam
                );
            }
        
        return $data; 
    } 


}
