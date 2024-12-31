
<div class="card rounded-0 ">
    <div class="card-body border-0">
    <div class="row">
        <div class="col-lg-3">
            <div class="card rounded-0">

                <div class="card-body p-2 text-sm" id="bodyDetail">
                   <div class="col-md-12">
                        
                   <div class="row">
                        <div class="col-md-12">
                            <label class="text-gray">Afdeling :</label>
                        </div>
                    </div>
                        
                        <div class="row">
                        
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="hidden" name="checkyear" id="baseUrl" value="<?= base_url() ?>">
                                    <select class="form-control" id="selectKtphAfd">
                                        
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <?php
                                        $uri = service('uri');
                                        $rute2 = $uri->getSegment(2);
                                        

                                        $rute = base_url("ktphdata/".$rute2);

                                        $dataOption ="
                                                singleSelect:true,
                                                url:'".$rute."',
                                                method:'get',
                                                rownumbers:true,
                                                fitColumns:true,
                                                maxHeight:450
                                                    ";

                                ?>
                                
                                <table id="jsKtph" class="table table-striped easyui-datagrid text-xs " width="100%"
                                        data-options="<?php echo $dataOption ;?>">
                                    <thead data-options="frozen:true">
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>       
                                            <th data-options="field:'ESTATECODE',resizable:false, width:90" ><p class="mt-2 mb-2 ml-1"><b>Kebun</b></p></th>
                                            <th data-options="field:'BLOCKID',resizable:true,resizable:false, width:90" ><p class="mt-2 mb-2 ml-1"><b>Blok</b></p></th>
                                            <th data-options="field:'PARAM',hidden:true,width:1">x</th>                                    
                
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
        <div class="col-lg-9">
            <div class="card rounded-0 ">  
                <div class="card-body p-3">
                    <?php
                        //$uri = service('uri');
                        //$rute2 = $uri->getSegment(2);
                        

                        $rute = base_url("ktphdetail2/D001");

                        $dataOption ="
                                singleSelect:false,
                                url:'".$rute."',
                                method:'get',
                                rownumbers:true,
                                autoRowHeight:false,
                                height:850
                                    ";

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card rounded-1">
                                <div class="card-body p-1">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <?php
                                                    $dtparam = "ktphCari('".base_url('ktphdata/')."')";
                                                ?>
                                                <button type="button" style="width:150px" class="form-control btn btn-block btn-success btn-sm mt-3 ml-4" onclick="<?= $dtparam ?>"><b>Cetak Kartu TPH</b></button>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="text-gray mt-1">
                                                - Pilih Kartu TPH yang akan di cetak <br>
                                                - Pilih semua dengan cara centang (checklist) pada Header
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="jsKtphDetail2" class="easyui-datagrid text-xs " style="width:100%"
                                        data-options="<?php echo $dataOption ;?>">
                            <thead>
                                <tr>
                                    <th data-options="field:'CK', checkbox:true"></th>       
                                    <th data-options="field:'TPHCODE',resizable:true" width="18%"><p class="mt-2 mb-2 ml-1"><b>TPH</b></p></th>
                                    <th data-options="field:'PARAM',hidden:true,width:1">x</th>
                                    <th data-options="field:'TPHDESCRIPTION',resizable:true" width="32%"><p class="mt-2 mb-2 ml-1"><b>Deskripsi</b></p></th>
                                    <th data-options="field:'BLOCKID',align:'center',resizable:true" width="30%"><p class="mt-2 mb-2 ml-1"><b>Blok</b></p></th>
                                    <th data-options="field:'FIELDCODE',resizable:true"><p class="mt-2 mb-2 ml-1"><b>Block Thn</b></p></th>
                                    <th data-options="field:'INPUTBY',resizable:true"><p class="mt-2 mb-2 ml-1"><b>Tahun TPH</b></p></th>
                                        
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

