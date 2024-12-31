
<div class="card rounded-0 ">
    <div class="card-body border-0">
    <div class="row">
        <div class="col-lg-4">
            <div class="card rounded-0">

                <div class="card-body p-2 text-sm" id="bodyDetail">
                   <div class="col-md-12">
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="text-gray">Tanggal Panen:</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="datepickerSab"/>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar text-primary" id="btnDateSab"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                        $dtparam = "sabCari('".base_url('sabdata/')."')";
                                    ?>
                                    <label class="text-gray"></label>
                                    <button id="btnCariSab" type="button" class="form-control btn btn-block btn-primary mt-2 btn-sm" onclick="<?= $dtparam ?>">Cari</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12"> 
                                <?php
                                        $uri = service('uri');
                                        $rute2 = $uri->getSegment(2);
                                        

                                        $rute = base_url("sabdata/".$rute2);

                                        $dataOption ="
                                                singleSelect:true,
                                                url:'".$rute."',
                                                method:'get',
                                                fitColumns:true,
                                                rownumbers:true,
                                                maxHeight:450
                                                    ";

                                ?>
                                <table id="jsSab" class="easyui-datagrid text-xs " style="width:100%"
                                    data-options="<?php echo $dataOption ;?>">
                                <thead data-options="frozen:true">
                                    <tr>
                                        <th data-options="field:'SAB',resizable:true,resizable:false" ><p class="mt-2 mb-2 ml-1"><b>SAB</b></p></th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>       
                                        
                                        <th data-options="field:'SOPIR',resizable:true" ><p class="mt-2 mb-2 ml-1"><b>Sopir</b></p></th>
                                        <th data-options="field:'PARAM',hidden:true,width:1">x</th>
                                        <th data-options="field:'TOTAL_JANJANG',align:'right',resizable:true" width="30%"><p class="mt-2 mb-2 ml-1"><b>Janjang</b></p></th>
                                        <th data-options="field:'BRONDOLAN',align:'right',resizable:true" width="30%"><p class="mt-2 mb-2 ml-1"><b>Brondol</b></p></th>
                                        <th data-options="field:'TKBM1',resizable:true"><p class="mt-2 mb-2 ml-1"><b>TKBM1</b></p></th>
                                        <th data-options="field:'TKBM2',resizable:true"><p class="mt-2 mb-2 ml-1"><b>TKBM2</b></p></th>
                                        <th data-options="field:'TKBM3',resizable:true"><p class="mt-2 mb-2 ml-1"><b>TKBM3</b></p></th>
                                        <th data-options="field:'TKBM4',resizable:true"><p class="mt-2 mb-2 ml-1"><b>TKBM4</b></p></th>
                                        <th data-options="field:'TKBM5',resizable:true"><p class="mt-2 mb-2 ml-1"><b>TKBM5</b></p></th>
                                        
              
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
                    <div id="jsGridSab"></div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

