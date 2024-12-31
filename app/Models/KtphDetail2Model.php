<?php

namespace App\Models;

use CodeIgniter\Model;

class KtphDetail2Model extends Model
{
    protected $table            = 'ktphdetail2s';
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

    public function getKtphDetail2($tblock) {      
        
        $sql = "SELECT TPHCODE, TPHDESCRIPTION, ESTATECODE, BLOCKID, ";
        $sql .= "FIELDCODE, INPUTBY ";
        $sql .= "FROM OPTPHMASTER ";
        $sql .= "WHERE BLOCKID = '$tblock'  AND INACTIVEDATE IS NULL";
   
           $row = $this->db->query($sql)->getResultArray();
               
               $i = 1;
               foreach ($row as $hsl){
                   $dttph = "<b>".$hsl['TPHCODE']."</b>";
                   $dttphdescription =$hsl['TPHDESCRIPTION'];
                   $dtblockid = $hsl['BLOCKID'];
                   $dtfieldcode = $hsl['FIELDCODE'];
                   $dtinputby = $hsl['INPUTBY'];                  
     
                   $ttph = str_replace("/", "-", $hsl['TPHCODE']);
                   $dtparam = $ttph;
                  
                   $data[] =array(
                            "NO" => $i++,
                            "TPHCODE" => $dttph,
                            "TPHDESCRIPTION" => $dttphdescription,
                            "BLOCKID" => $dtblockid,
                            "FIELDCODE" => $dtfieldcode,
                            "INPUTBY" => $dtinputby,
                            "PARAM" => $dtparam
                   );
               }
               
        return $data; 
    } 

}
