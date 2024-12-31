
<div class="card rounded-0 ">
    <div class="card-body border-0 row">
        <div class="col-md-3">
            <div class="card rounded-0">

                <div class="card-body p-2">
                    <ul class="nav nav-pills flex-column">
                        
                        <li class="nav-item">
                            <div class="form-group">
                                <label class="text-gray">Tanggal Awal:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="dateRestan1"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar text-primary" id="btnDateRestan1"></i></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                        <div class="form-group">
                                <label class="text-gray">Tanggal Akhir:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="dateRestan2"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar text-primary" id="btnDateRestan2"></i></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <button id="btnRestanCari" type="button" class="btn btn-block btn-primary btn-sm mt-4 ">Cari</button>
                        </li>
                    </ul>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card rounded-0 ">  
                <div class="card-body p-2">  
                    <div id="jsRestan"></div>
                </div>
            </div>
        </div>
    </div>
</div>

