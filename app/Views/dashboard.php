<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
     
      echo view('partial/header'); 
  ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php echo view('partial/top_menu'); ?>

  <?php echo view('partial/side_menu'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php 
          $uri = service('uri');
          $rute = $uri->getSegment(1);

          $header['title'] = $title;

          if ($rute == "produksi" || $rute == "produksidetail" || $rute == "mapsproduksi"){
            $icons = "fa-seedling text-green";
          }else if ($rute == "restan" || $rute == "restandetail"){
            $icons = "fa-bell text-warning";
          }else if ($rute == "sab" || $rute == "sabdetail" ){
            $icons = "fa-truck text-info";
          }else if ($rute == "ktph"){
            $icons = "fa-qrcode text-gray";
          }else{
            $icons = "fa-chart-bar text-primary";
          }
               
          $header['icon'] = $icons;

          echo view('partial/content_header', $header); 

      ?>

      <!-- Main content -->
      <section class="content ">

      <?php 
          /*
            Cek current URL untuk memanggil dynamic view
            simpan dalam variable $rute
          */

          //--------------------------------------------
          if ($rute == "mapsproduksi"){
            $rute = "maps/produksi";
          }

          if($rute == ''){
            echo view('dashboard/layout');  
          }else {
            echo view($rute.'/layout'); 
          }

      ?>
      
      
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <?php echo view('partial/footer', $header); ?>
    
  </div>
  <!-- ./wrapper -->


  </body>

</html>