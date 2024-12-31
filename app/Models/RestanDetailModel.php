<?php

namespace App\Models;

use CodeIgniter\Model;

class RestanDetailModel extends Model
{
    protected $table            = 'restandetails';
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

    public function getRestanDetail($tafd) {           

        $sql = "SELECT TO_DATE(A.TDATE,'ddmmyyyy') TDATE, A.TDATE TDATE1, SUM(TOTAL_JANJANG_PANEN) TOTAL_JANJANG, ";
        $sql .= "SUM(BRONDOLAN) BRONDOLAN ";
        $sql .= "FROM db_eharvesting.MASTERHASILEDIT A, FIELDCROP B ";
        $sql .= "WHERE B.FIELDCODE = A.FIELDCODE AND A.STANGKUT ='FALSE' #WHERE# ";
        $sql .= "GROUP BY A.TDATE";

        $where = " AND B.DIVISIONCODE = '$tafd' ";

        $sql = str_replace("#WHERE#", $where, $sql);

        $row = $this->db->query($sql)->getResultArray();
            
            $i = 1;
            foreach ($row as $hsl){
                $dttdate = $hsl['TDATE'];
                $dttdate1 = $hsl['TDATE1'];
                $dttotal_janjang = number_format($hsl['TOTAL_JANJANG'],0,'.',',');
                $dtbrondolan = number_format($hsl['BRONDOLAN'],0,'.',',');

               // $dttgl = substr($dttdate1,2,2)."-".substr($dttdate1,0,2)."-".substr($dttdate1,4,4);
                              
                $dtparam = base_url('restandetail2/').$dttdate1."/".$tafd;
              
                $data['rows'][] =array(
                        "NO" => $i++, 
                        "TDATE" => $dttdate,
                        "TDATE1" => $dttdate1,
                        "TOTAL_JANJANG" => $dttotal_janjang,
                        "BRONDOLAN" => $dtbrondolan,
                        "PARAM" => $dtparam
                );
            }
        
        return $data; 
    } 


}
