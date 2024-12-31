<?php

namespace App\Models;

use CodeIgniter\Model;

class SabDetail2Model extends Model
{
    protected $table            = 'sabdetail2s';
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

    public function getSabDetail2($tsab) {      
        
     $sql = "SELECT A.TPHCODE, TO_CHAR(TO_DATE (A.tdate, 'ddmmyyyy'),'DD-MON-YYYY') TGL_PANEN, ";
     $sql .= "TOTAL_JANJANG_PANEN TOTAL_JANJANG, "; 
     $sql .= "BRONDOLAN,  ";
     $sql .= "BUAH_MENTAH, ";
     $sql .= "BUAH_LEWAT_MASAK, ";
     $sql .= "BUAH_BUSUK, ";
     $sql .= "TANDAN_KOSONG, ";
     $sql .= "TANGKAI_PANJANG, ";
     $sql .= "KOTORAN, ";
     $sql .= "ABNORMAL, ";
     $sql .= "TO_CHAR(TO_DATE (A.tdate, 'ddmmyyyy'),'MM-DD-YYYY') TDATE, ";
     $sql .= "(B.EMPCODE ||' - '|| GET_EMPNAME(B.EMPCODE)) PEMANEN, ";
     $sql .= "(B.INPUTBY || '-' || GET_EMPNAME(B.INPUTBY)) INPUTBY, ";
     $sql .= "TKBM1,  ";
     $sql .= "TKBM2,  ";
     $sql .= "TKBM3,  ";
     $sql .= "TKBM4,  ";
     $sql .= "TKBM5,  ";
     $sql .= "VERIFIED, ";
     $sql .= "A.INPUTDATE, STANGKUT, B.KARTU_PANEN, ";
     $sql .= "(TO_DATE(A.TGLANGKUT,'ddmmyyyy') - TO_DATE(B.TDATE,'ddmmyyyy')) STATUS, ";
     $sql .= "FOTO ";
     $sql .= "FROM V_MASTERANGKUT A, db_eharvesting.masterhasiledit B  ";
     $sql .= "WHERE ";
     $sql .= "A.TPHCODE = B.TPHCODE  ";
     $sql .= "AND A.TDATE = B.TDATE  ";
     $sql .= "AND A.KARTU_PANEN = B.KARTU_PANEN  ";
     $sql .= "AND a.empcode = b.empcode  ";
     $sql .= "AND a.fieldcode = b.fieldcode ";
     $sql .= "AND SAB = '$tsab' ";

        $row = $this->db->query($sql)->getResultArray();
            
            $i = 1;
            foreach ($row as $hsl){
                $dttph = $hsl['TPHCODE'];
                $dttotal_janjang = number_format($hsl['TOTAL_JANJANG'],0,'.',',');
                $dtbrondolan = number_format($hsl['BRONDOLAN'],0,'.',',');
                $dtinputby = $hsl['INPUTBY'];
                $dtverified = $hsl['VERIFIED'];
                $dtbuah_mentah = $hsl['BUAH_MENTAH'];
                $dtbuah_lewat_masak = number_format($hsl['BUAH_LEWAT_MASAK'],0,'.',',');
                $dtbuah_busuk = number_format($hsl['BUAH_BUSUK'],0,'.',',');
                $dttandan_kosong = number_format($hsl['TANDAN_KOSONG'],0,'.',',');
                $dttangkai_panjang = number_format($hsl['TANGKAI_PANJANG'],0,'.',',');
                $dtkotoran = number_format($hsl['KOTORAN'],0,'.',',');
                $dtabnormal = number_format($hsl['ABNORMAL'],0,'.',',');
                $dtstangkut = $hsl['STANGKUT'];
                $dtkartu_panen = $hsl['KARTU_PANEN'];
                $dtfoto = $hsl['FOTO'];
                $dtinputdate = $hsl['INPUTDATE'];
                $dtpemanen = $hsl['PEMANEN'];
                $dtdate = $hsl['TDATE'];
                $dttgl_panen = $hsl['TGL_PANEN'];

                $dtformat = explode('_',$hsl['FOTO']);
                $ft1 = substr(strval($dtformat[0]),4);
                $ft2 = substr(strval($dtformat[0]),2,2);
                $ft3 = substr(strval($dtformat[0]),0,2); 
                $ft= "http://10.20.36.26/matang/".$ft1.$ft2."/".$ft3."/".strval($hsl['FOTO']);

                $ttph = str_replace("/", "-", $dttph);
                $base_rute ="/produksidetail2modal/$dtdate/$ttph";
                $dtparam = "showModal('".$base_rute."')";

                if ($dtverified == ""){
                    $badgeVer = '<span class="badge badge-warning"><i class="fa fa-check">&nbsp;</i><code class="text-light text-xs ml-2">Belum verifikasi</code></span>';
                    
                }else {
                    $badgeVer = '<span class="badge badge-primary"><i class="fa fa-check">&nbsp;</i><code class="text-light text-xs ml-2">sudah verifikasi</code></span>';
                }

                if ($dtstangkut == "Sudah di angkut"){
                    $badgeAng = '<span class="badge badge-success mt-1"><i class="fa fa-truck">&nbsp;</i><code class="text-light text-xs ml-2">sudah diangkut</code></span>';
                }else {
                    $badgeAng = '<span class="badge badge-danger mt-1"><i class="fa fa-truck">&nbsp;</i><code class="text-light text-xs ml-2">belum diangkut</code></span>';
                }

                $badgePen = intval($hsl['BUAH_MENTAH']) + intval($hsl['BUAH_LEWAT_MASAK']) + intval($hsl['BUAH_BUSUK'])+ intval($hsl['TANDAN_KOSONG']) + intval($hsl['TANGKAI_PANJANG']) + intval($hsl['KOTORAN']) + intval($hsl['ABNORMAL']);
                if ($badgePen > 0 ) {
                    $badgeBell = '<span class="badge badge-danger mt-1"><i class="fa fa-bell">&nbsp;</i><code class="text-light text-xs ml-2">pinalti</code></span>';
                 }else { $badgeBell =""; }


                $dtfoto = '<div class="card">
                                <div class="card-body rounded-0 border-0">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img class="img-fluid p-2" src="'.$ft.'" alt="Photo">
                                        </div>
                                    </div>
                                </div>
                            </div>                
                            ';

                $dtpanen = '<div class="card p-0">
                                <div class="card-body rounded-0 text-xs p-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <table class="table table-sm p-1" style="border-bottom: none; border-top: none;">
                                                <tr>
                                                    <td style="border-bottom: none; border-top: none;" ><label class="text-gray">TPH</label></td>
                                                    <td style="border-bottom: none; border-top: none;" ><b>'.$dttph.'</b></td>  
                                                </tr>
                                                <tr>
                                                    <td style="border-bottom: none; border-top: none;" ><label class="text-gray">K.Panen</label></td>
                                                    <td style="border-bottom: none; border-top: none;" ><b>'.$dtkartu_panen.'</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-bottom: none; border-top: none;" ><label class="text-gray">Checker</label></td>
                                                    <td style="border-bottom: none; border-top: none;" ><b>'.$dtinputby.'</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-bottom: none; border-top: none;" ><label class="text-gray mr-2 ">Pemanen</label></td>
                                                    <td style="border-bottom: none; border-top: none;" ><b>'.$dtpemanen.'</b></td>
                                                </tr>

                                            </table>
                                                                             
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="table table-sm">
                                                        <table class="table ml-1 p-0" >
                                                            <tr>
                                                                <th style="width:100" class="m-0 p-0"><label class="text-gray">Tanggal</label></th>
                                                                <td style="width:70" class="m-0 p-0"><b>'.$dttgl_panen.' </b>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:100" class="m-0 p-0"><label class="text-gray">Janjang</label></td>
                                                                <td style="width:70;" class="m-0 p-0 text-right"><b>'.$dttotal_janjang.' </b>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="m-0 p-0"><label class="text-gray">Brondolan</label></th>
                                                                <td class="m-0 p-0 text-right"><b>'.$dtbrondolan.' </b>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="m-0 p-0"><label class="text-gray">Lewat Masak</label></th>
                                                                <td class="m-0 p-0 text-right"><b>'.$dtbuah_lewat_masak.' </b>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="m-0 p-0"><label class="text-gray">Buah Busuk</label></th>
                                                                <td class="m-0 p-0 text-right"><b>'.$dtbuah_busuk.' </b>&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                
                                                </div>

                                                <div class="col-6">
                                                    <div class="table table-sm">
                                                        <table class="table">
                                                            <tr>
                                                                <th style="width:100" class="m-0 p-0"><label class="text-gray">Tandan Kosong</label></th>
                                                                <td style="width:70" class="m-0 p-0 text-right"><b>'.$dttandan_kosong.' </b>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="m-0 p-0"><label class="text-gray">Kotoran</label></th>
                                                                <td class="m-0 p-0 text-right"><b>'.$dtkotoran.' </b>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="m-0 p-0"><label class="text-gray">Abnormal</label></th>
                                                                <td class="m-0 p-0 text-right"><b>'.$dtabnormal.' </b>&nbsp;</td>
                                                            </tr>

                                                            <tr>
                                                             
                                                                <th><button type="button" class="btn btn-xs btn-success mt-2" onclick="'.$dtparam.'">
                                                                        &nbsp;&nbsp;Detail&nbsp;&nbsp;
                                                                    </button>
                                                                </th>                                         
                                                             </tr>
                                                             
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="card">
                                                    <div class="card-body rounded-0 p-0">
                                                        <img class="img-fluid" src="'.$ft.'" alt="Foto panen">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                '.$badgeVer.$badgeAng.$badgeBell.'
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>            
                            ';
               
                $data[] =array(
                        "DESC" => $dtpanen
                );
            }
            //$test = $tdate." - ".$tafd;
        return $data; 
    } 

}
