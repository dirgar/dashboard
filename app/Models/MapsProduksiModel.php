<?php

namespace App\Models;

use CodeIgniter\Model;

class MapsProduksiModel extends Model
{
    protected $table            = 'mapsproduksis';
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
/*
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect('default',true);
        $this->mysql = \Config\Database::connect('mysql',true);
    }

    public function getMapsIndex() {      

        $sql = "SELECT * FROM MST_ALL_MAP WHERE SITE = 'SMG'";
            
        $row = $this->mysql->query($sql)->getResultArray();
            
        $rows = count($row);

        $koma = ',';
        
        $Header_JSON = '{"type": "FeatureCollection",
                        "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
                        "features": [';
        $Body_JSON = '';

        $i = 1;
        foreach ($row as $rst) {
            if ($i == $rst ){
                $koma = '';
            }
            $Body_JSON .= '{ "type": "Feature", "properties": '. $rst['properties'].', "geometry": { "type": "'. $rst['TYPE'] .'", "coordinates": '.$rst['KOORDINAT'].'}}'.$koma;	

            $i++;

        }
        $Footer_JSON = '	] }';
        $data = $Header_JSON.$Body_JSON.$Footer_JSON;

            
        return $data;
    }
*/
    public function getMapsMarkers($tblok = false, $tdate = false) {
        $tdate = str_replace("/", "-", $tdate);
        if ($tblok != false){
            //$this->db = \Config\Database::connect('default',true);
            //$this->mysql = \Config\Database::connect('mysql',false);

            $sql = "select b.BLOCKID,a.TDATE, a.GANGCODE, a.MANDORECODE, a.MANDORE1CODE, a.EMPCODE,
                a.EMPNAME, a.EMPCODE_LF, a.EMPNAME_LF, a.TPHCODE, a.FIELDCODE,
                a.BUAH_MASAK, a.BUAH_MENTAH,
                a.BUAH_LEWAT_MASAK, a.BRONDOLAN, a.TOTAL_JANJANG_PANEN, a.BUAH_BUSUK,
                a.TANDAN_KOSONG, a.TANGKAI_PANJANG, a.KOTORAN, a.ABNORMAL, a.PT,
                a.TS, a.BS, a.KARTU_PANEN, a.FOTO, decode(a.LAT,'0.0',c.lat,a.lat)
                LAT,decode(a.LONGITUDE,'0.0',c.LONGITUDE,a.LONGITUDE) LONGITUDE,
                a.INPUTBY, a.INPUTDATE, a.STUPLOAD, a.IMGSTUPLOAD, a.STRSTUPLOAD,
                a.STANGKUT, a.IMGSTANGKUT, a.STRSTANGKUT,
                a.VERIFIED, a.VERIFIED_ID, a.VERIFIED_NAME, a.CATATAN,
                a.ORC_INS_TIME_ID, a.EMPCODE_ORG,
                a.TDATE_ORG,TO_CHAR(TO_DATE(A.INPUTDATE,'DDMMYYYY
                HH24:MI:SS'),'HH24:MI:SS') INPUTHOUR,
                B.DIVISIONCODE AFD from MASTERHASILEDIT A, OPTPHMASTER B, optphkoordinat c
                where A.TPHCODE = B.TPHCODE
                and a.tphcode = c.tphcode
                and a.tphcode = b.tphcode
                AND B.BLOCKID = '$tblok' and TO_DATE (A.TDATE, 'ddmmyyyy') =
                TO_DATE('$tdate', 'MM/DD/YYYY')";

            $row = $this->db->query($sql)->getResultArray();
            $rows = count($row);
            foreach ($row as $hsl){
                $dttphcode = $hsl['TPHCODE'];
                $dtjjg = $hsl['TOTAL_JANJANG_PANEN'];
                $dtbrondolan = $hsl['BRONDOLAN'];
                $dtkordinatlat = $hsl['LAT'];
                $dtkordinatlong = $hsl['LONGITUDE'];
                $dtjam = $hsl['INPUTHOUR'];

                $dttph = str_replace("/", "-", $dttphcode);
                $tdate = str_replace("/", "-", $tdate);
                $base_rute =base_url()."produksidetail2modal/$tdate/$dttph";
                $dtparam = $base_rute;
               
/*
                $data[] =array(
                        "TPHCODE" => dttphcod$e, 
                        "TOTAL_JANJANG_PANEN" => $dtjjg,
                        "BRONDOLAN" => $dtbrondolan,
                        "LAT" => $dtkordinatlat,
                        "LONGITUDE" => $dtkordinatlong,
                        "INPUTHOUR" => $dtjam
                );
*/
                $data[] = array($hsl['TPHCODE'],$hsl['LAT'],$hsl['LONGITUDE'],$hsl['TOTAL_JANJANG_PANEN'],$hsl['BRONDOLAN'],$hsl['INPUTHOUR'],$hsl['INPUTBY'],$hsl['FIELDCODE'],$hsl['TDATE'],$hsl['AFD'],$hsl['FOTO'],$hsl['BLOCKID'],$dtparam);
            }
            if ($rows == 0){
                $data[] = "400";
            }
        }else{
            $data[] = "400";
        }
        return $data;
                
    }

}
