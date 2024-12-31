<div class="card" id="bodyDetailProduksi">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">    
                   <div class="col-md-6">
                        <table class="table table-sm text-sm" style="border-bottom: none; border-top: none;">
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">TPH</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><strong><?= $hsl[0]["TPHCODE"] ?></strong></label></td>  
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Tanggal</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["INPUTDATE"] ?></b></label></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">K.Panen</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["KARTU_PANEN"] ?></b></label></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Blok</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["FIELDCODE"] ?></b></label></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Gang</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["GANGCODE"] ?></b></label></td>
                            </tr>
                            

                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm text-sm" style="border-bottom: none; border-top: none;">
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Checker</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["INPUTBY"] ?></b></label></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Mandor</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["MANDORE"] ?></b></label></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Pemanen</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><strong><?= $hsl[0]["PEMANEN"] ?></strong></label></td>  
                            </tr>
                            <tr>
                                <td style="border-bottom: none; border-top: none;"><label class="text-gray">Pasangan</label></td>
                                <td style="border-bottom: none; border-top: none;"><label><b><?= $hsl[0]["PASANGAN"] ?></b></label></td>
                            </tr>

                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        
                            <table class="table table-sm text-sm text-secondary ml-1" >
                                <tr>
                                    <th><label>Janjang</label></th>
                                    <td><b><?= $hsl[0]["TOTAL_JANJANG"] ?></b></td>
                                </tr>
                                <tr>
                                    <th><label>Brondolan</label></th>
                                    <td><b><?= $hsl[0]["BRONDOLAN"] ?></b></td>
                                </tr>
                                <tr>
                                    <th><label>Lewat Masak</label></th>
                                    <td><b><?= $hsl[0]["BUAH_LEWAT_MASAK"] ?></b></td>
                                </tr>
                                <tr>
                                    <th><label>Buah Busuk</label></th>
                                    <td><b><?= $hsl[0]["BUAH_BUSUK"] ?></b></td>
                                </tr>
                            </table>
        

                    </div>
                    <div class="col-lg-6">
                        
                            <table class="table table-sm text-sm text-secondary ml-1" >
                                <tr>
                                    <th><label>Tangkai Panjang</label></th>
                                    <td><b><?= $hsl[0]["TANGKAI_PANJANG"] ?></b></td>
                                </tr>
                                <tr>
                                    <th><label>Tandan Kosong</label></th>
                                    <td><b><?= $hsl[0]["TANDAN_KOSONG"] ?></b></td>
                                </tr>
                                <tr>
                                    <th><label>Kotoran</label></th>
                                    <td><b><?= $hsl[0]["KOTORAN"] ?></b></td>
                                </tr>
                                <tr>
                                    <th><label>Abnormal</label></th>
                                    <td><b><?= $hsl[0]["ABNORMAL"] ?></b></td>
                                </tr>
                            </table>
                        
                    </div>
                </div>

            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="card">
                        <div class="card-body rounded-0 p-0">
                            <?php
                                $tmpfoto = $hsl[0]["FOTO"];
                                $dtformat = explode('_', $tmpfoto);
                                $ft1 = substr(strval($dtformat[0]),4);
                                $ft2 = substr(strval($dtformat[0]),2,2);
                                $ft3 = substr(strval($dtformat[0]),0,2); 
                                $ft= "http://10.20.36.26/matang/".$ft1.$ft2."/".$ft3."/".$tmpfoto;
                            ?>
                            <img class="img-fluid" src="<?= $ft ?>" alt="Foto panen">
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                        <?= $hsl[0]["VERIFIED"]." ".$hsl[0]["STANGKUT"]." ".$hsl[0]["PINALTI"] ?>
                </div>
            
            </div>
        </row>
    </div>
</div>