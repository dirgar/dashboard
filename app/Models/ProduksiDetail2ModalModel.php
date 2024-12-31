<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiDetail2ModalModel extends Model
{
    protected $table            = 'produksidetail2modals';
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

    public function getDetail2Modals($tdate, $ttph) {           

        $ttph = str_replace("-", "/", $ttph);

        $sql = "SELECT TPHCODE, TOTAL_JANJANG_PANEN TOTAL_JANJANG, BRONDOLAN, (INPUTBY ||' - ' ||  GET_EMPNAME(INPUTBY)) INPUTBY, VERIFIED, ";
        $sql .= "BUAH_MENTAH, IMGSTUPLOAD, ";
        $sql .= "BUAH_LEWAT_MASAK, BUAH_BUSUK, ";
        $sql .= "TANDAN_KOSONG, TANGKAI_PANJANG, ";
        $sql .= "KOTORAN, ABNORMAL, GANGCODE, FIELDCODE, (MANDORECODE ||' - ' ||  GET_EMPNAME(MANDORECODE)) MANDORE, ";
        $sql .= "STANGKUT, KARTU_PANEN, FOTO, EMPCODE, EMPNAME, EMPCODE_LF, EMPNAME_LF, FOTO_TPH, INPUTDATE, TDATE, SUBSTR(INPUTDATE,10,10) INPUTTIME ";
        $sql .= "FROM MASTERHASILEDIT ";
        $sql .= "WHERE  TPHCODE = '$ttph' AND TO_DATE (TDATE, 'ddmmyyyy') = TO_DATE ('$tdate', 'MM/DD/YYYY') ";

        $row = $this->db->query($sql)->getResultArray();
            
            $i = 1;
            foreach ($row as $hsl){
                $dttph = $hsl['TPHCODE'];
                $dttotal_janjang = number_format($hsl['TOTAL_JANJANG'],0,'.',',');
                $dtbrondolan = number_format($hsl['BRONDOLAN'],0,'.',',');
                $dtinputby = $hsl['INPUTBY'];
                $dtverified = $hsl['VERIFIED'];
                $dtbuah_mentah = $hsl['BUAH_MENTAH'];
                $dtimgsupload = $hsl['IMGSTUPLOAD'];
                $dtbuah_lewat_masak = number_format($hsl['BUAH_LEWAT_MASAK'],0,'.',',');
                $dtbuah_busuk = number_format($hsl['BUAH_BUSUK'],0,'.',',');
                $dttandan_kosong = number_format($hsl['TANDAN_KOSONG'],0,'.',',');
                $dttangkai_panjang = number_format($hsl['TANGKAI_PANJANG'],0,'.',',');
                $dtkotoran = number_format($hsl['KOTORAN'],0,'.',',');
                $dtabnormal = number_format($hsl['ABNORMAL'],0,'.',',');
                $dtstangkut = $hsl['STANGKUT'];
                $dtkartu_panen = $hsl['KARTU_PANEN'];
                $dtfoto = $hsl['FOTO'];
                $dtfoto_tph = $hsl['FOTO_TPH'];
                $dtinputdate = $hsl['INPUTDATE'];
                $dtinputtime = $hsl['INPUTTIME'];
                $dtempcode = $hsl['EMPCODE'];
                $dtempname = $hsl['EMPNAME'];
                $dtempcodelf = $hsl['EMPCODE_LF'];
                $dtempnamelf = $hsl['EMPNAME_LF'];
                $dtgangcode = $hsl['GANGCODE'];
                $dtfieldcode = $hsl['FIELDCODE'];
                $dtmandore = $hsl['MANDORE'];

                /*
                $dtformat = explode('_',$hsl['FOTO']);
                $ft1 = substr(strval($dtformat[0]),4);
                $ft2 = substr(strval($dtformat[0]),2,2);
                $ft3 = substr(strval($dtformat[0]),0,2); 
                $ft= "http://10.20.36.26/matang/".$ft1.$ft2."/".$ft3."/".strval($hsl['FOTO']);
                */
                $dtparam = "produksidetail2modal/".$tdate."/".$hsl['TPHCODE'];    
                
                $dtpemanen = $dtempcode." - ". $dtempname;

                $dtpasangan = "";
                if (strlen($dtempcodelf) > 1 ) {
                    $dtpasangan = $dtempcodelf." - ".$dtempnamelf;
                }

                if ($dtverified == ""){
                    $badgeVer = '<span class="badge badge-warning mr-2"><i class="fa fa-check">&nbsp;</i><code class="text-light text-xs ml-2">Belum verifikasi</code></span>';
                    
                }else {
                    $badgeVer = '<span class="badge badge-primary mr-2"><i class="fa fa-check">&nbsp;</i><code class="text-light text-xs ml-2">sudah verifikasi</code></span>';
                }

                if ($dtstangkut == "Sudah di angkut"){
                    $badgeAng = '<span class="badge badge-success mr-2"><i class="fa fa-truck">&nbsp;</i><code class="text-light text-xs ml-2">sudah diangkut</code></span>';
                }else {
                    $badgeAng = '<span class="badge badge-danger text-sm mr-2"><i class="fa fa-truck">&nbsp;</i><code class="text-light text-xs ml-2">belum diangkut</code></span>';
                }

                $badgePen = intval($hsl['BUAH_MENTAH']) + intval($hsl['BUAH_LEWAT_MASAK']) + intval($hsl['BUAH_BUSUK'])+ intval($hsl['TANDAN_KOSONG']) + intval($hsl['TANGKAI_PANJANG']) + intval($hsl['KOTORAN']) + intval($hsl['ABNORMAL']);
                if ($badgePen > 0 ) {
                    $badgeBell = '<span class="badge badge-danger text-sm mr-2"><i class="fa fa-bell">&nbsp;</i><code class="text-light text-xs ml-2">pinalti</code></span>';
                 }else { $badgeBell =""; }

                $data[] =array(
                        "TPHCODE" => $dttph,
                        "TOTAL_JANJANG" => $dttotal_janjang,
                        "BRONDOLAN" => $dtbrondolan,
                        "INPUTBY" => $dtinputby,
                        "VERIFIED" => $badgeVer,
                        "BUAH_MENTAH" => $dtbuah_mentah,
                        "IMGSTUPLOAD" => $dtimgsupload,
                        "BUAH_LEWAT_MASAK" => $dtbuah_lewat_masak,
                        "BUAH_BUSUK" => $dtbuah_busuk,
                        "TANDAN_KOSONG" => $dttandan_kosong,
                        "TANGKAI_PANJANG" => $dttangkai_panjang,
                        "KOTORAN" => $dtkotoran,
                        "ABNORMAL" => $dtabnormal,
                        "STANGKUT" => $badgeAng,
                        "KARTU_PANEN" => $dtkartu_panen,
                        "FOTO" => $dtfoto,
                        "INPUTDATE" => $dtinputdate,
                        "INPUTTIME" => $dtinputtime,
                        "PARAM" => $dtparam,
                        "PEMANEN" => $dtpemanen,
                        "PASANGAN" => $dtpasangan,
                        "PINALTI" => $badgeBell,
                        "GANGCODE" => $dtgangcode,
                        "FIELDCODE" => $dtfieldcode,
                        "MANDORE" => $dtmandore
                        );
            }

        return $data; 
    }

}
