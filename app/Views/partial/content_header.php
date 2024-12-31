<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                
                    <h3 class="text-gray text-sm-2"><strong><i class="nav-icon fas <?= $icon ?>"></i>&nbsp;&nbsp;<?= $title ?></strong></h3>
                
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <?php
                    $url = base_url();
                ?>
                <li class="breadcrumb-item"><a href="<?= $url ?>">Home</a></li>
                <?php
                  if ($title == "Produksi Detail" || $title == "Restan Detail" ){
                ?>
                    <li class="breadcrumb-item active">Operasional</li>
                <?php  
                  }else if($title == "Peta Produksi" || $title == "Peta Restan"){
                ?>
                    <li class="breadcrumb-item active">Peta</li>
                <?php  
                  }
                ?>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>