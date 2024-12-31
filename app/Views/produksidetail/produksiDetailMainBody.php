
<div class="card rounded-0 ">
    <div class="card-body border-0">
    <div class="row">
        <div class="col-lg-4">
            <div class="card rounded-0">

                <div class="card-body p-2 text-sm" id="bodyDetail">
                   <div class="col-md-12">
                                          
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="text-gray">Tanggal Panen:</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="datepickerDetail"/>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar text-primary" id="btnDateDetail"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-gray">Afdeling :</label>
                            </div>
                        </div>
                        
                        <div class="row">
                        <!-- select -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" id="selectAfd">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        $dtparam = "produksiDetailCari('".base_url('produksidetailafd/')."')";
                                    ?>
                                    <button type="button" class="form-control btn btn-block btn-primary btn-sm" onclick="<?= $dtparam ?>">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <?php
                                        $uri = service('uri');
                                        $rute2 = $uri->getSegment(2);
                                        $rute3 = $uri->getSegment(3);

                                        $rute = base_url("produksidetailafd/".$rute2."/".$rute3);

                                        $dataOption ="
                                                singleSelect:true,
                                                url:'".$rute."',
                                                method:'get',
                                                fitColumns:true,
                                                rownumbers:true,
                                                maxHeight:550
                                                    ";

                                ?>
                                <table id="jsGridAfd" class="easyui-datagrid text-xs " style="width:100%"
                                    data-options="<?php echo $dataOption ;?>">
                                <thead>
                                    <tr>
                                        <th data-options="field:'PARAM',hidden:true, width:1">x</th>
                                        <th data-options="field:'BLOK',resizable:true,resizable:false" width="30%"><p class="mt-2 mb-2 ml-1"><b>Blok</b></p></th>
                                        <th data-options="field:'TOTAL_JANJANG',align:'right',resizable:true" width="24%"><p class="mt-2 mb-2 ml-1"><b>Janjang</b></p></th>
                                        <th data-options="field:'BRONDOLAN',align:'right',resizable:true" width="24%"><p class="mt-2 mb-2 ml-1"><b>Brondol</b></p></th>
                                        <th data-options="field:'BUAH_MASAK',align:'right',resizable:true" width="24%"><p class="mt-2 mb-2 ml-1"><b>Masak</b></p></th>
                                        
                                    </tr>
                                </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card rounded-0 ">  
                <div class="card-body p-3">
                    <div id="jsGridDetail"></div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

