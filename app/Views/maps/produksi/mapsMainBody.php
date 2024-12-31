<div class="card rounded-0 ">
    <div class="card-body border-0">
    <div class="row">
        <div class="col-lg-2">
            <div class="card rounded-0">

                <div class="card-body p-2 text-sm">
                   <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                            <label class="text-gray">Tanggal:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="mapsDatePicker"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar text-primary" id="btnDate"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-gray text-xs">Afdeling :</label>
                            </div>
                        </div>
                        
                        <div class="row mb-1">
                        
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="hidden" name="checkyear" id="baseUrl" value="<?= base_url() ?>">
                                    <select class="form-control-xs" id="selectMapsAfd">
                                        
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="card rounded-0 m-0 p-0 col-lg-12 mb-2" style="width:205px">
                                    <div class="card-body bg-light p-0">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-flat">
                                                <i class="fas fa-align-center" alt="test"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-flat ml-1">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-flat ml-1">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-flat ml-1">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-flat ml-1">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                        </div> 
                                    </div>
                                    
                                </div>
                                

                                <?php
                                        $uri = service('uri');
                                        //$rute2 = $uri->getSegment(2);
                                        
                                        $rute = base_url("listblok/AFD-I");

                                        $dataOption ="
                                                singleSelect:false,
                                                url:'".$rute."',
                                                method:'get',
                                                rownumbers:true,
                                                fitColumns:true,
                                                maxHeight:390
                                                    ";
                                ?>
                                
                                <table id="jsMapsProduksi" class="table table-striped easyui-datagrid text-xs " width="102%"
                                        data-options="<?php echo $dataOption ;?>">
                                    <thead data-options="frozen:true">
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>       
                                            <th data-options="field:'CK', checkbox:true"></th>
                                            <th data-options="field:'BLOCKID',resizable:true,resizable:false, width:90" ><p class="mt-2 mb-2 ml-1"><b>Blok</b></p></th>
                                            <th data-options="field:'ESTATECODE',resizable:false, width:90" ><p class="mt-2 mb-2 ml-1"><b>Kebun</b></p></th>
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
        <div class="col-lg-8">
            <div class="row">
                <div class="card rounded-0 col-md-12">
                    <div class="card-body">
                        
                        <div id="map"  style="height: 600px;" width="1100px"></div>        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="row">
                <div class="card rounded-0 col-md-12 ml-2 p-1">
                    <div class="card-body p-1" height="500px">
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
