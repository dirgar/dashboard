  <footer class="main-footer">
    <div class="float-right d-none d-sm-block text-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright © 2024-2025 Harvee System.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<?php echo view('partial/modal'); ?>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>harvee/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>harvee/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>harvee/dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>harvee/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>harvee/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="<?= base_url(); ?>harvee/plugins/jsgrid/jsgrid.min.js"></script>

<script src="<?= base_url(); ?>harvee/plugins/jquery-ui/jquery-ui.js"></script>

<script src="<?= base_url('harvee/js/produksi/produksi.js'); ?>"></script>
<script src="<?= base_url('harvee/js/produksi/produksiCari.js'); ?>"></script>

<script src="<?= base_url('harvee/js/produksidetail/produksidetail.js'); ?>"></script>
<script src="<?= base_url('harvee/js/produksidetail/produksidetail2.js'); ?>"></script>
<script src="<?= base_url('harvee/js/produksidetail/produksidetailCari.js'); ?>"></script>

<script src="<?= base_url('harvee/js/restan/restan.js'); ?>"></script>
<script src="<?= base_url('harvee/js/restan/restanCari.js'); ?>"></script>

<script src="<?= base_url('harvee/js/restandetail/restandetail.js'); ?>"></script>
<script src="<?= base_url('harvee/js/restandetail/restandetail2.js'); ?>"></script>
<script src="<?= base_url('harvee/js/restandetail/restandetailCari.js'); ?>"></script>

<script src="<?= base_url('harvee/js/sab/sab.js'); ?>"></script>
<script src="<?= base_url('harvee/js/sab/sab2.js'); ?>"></script>
<script src="<?= base_url('harvee/js/sab/sabCari.js'); ?>"></script>

<script src="<?= base_url('harvee/js/ktph/ktph.js'); ?>"></script>

<?php
  if ($title == "Peta Produksi"){
?>

  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/qgis2web_expressions.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/leaflet.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/L.Control.Layers.Tree.min.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/L.Control.Locate.min.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/leaflet.rotatedMarker.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/leaflet.pattern.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/leaflet-hash.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/Autolinker.min.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/rbush.min.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/labelgun.min.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/labels.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/leaflet-control-geocoder.Geocoder.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/js/leaflet-measure.js"></script>
  <script src="<?= base_url(); ?>harvee/plugins/leaflet/data/Master_Blok_2025_SMG_0.js"></script>

  <script src="<?= base_url('harvee/js/mapsproduksi/mapsproduksi.js'); ?>"></script>
  <script src="<?= base_url('harvee/js/mapsproduksi/maps.js'); ?>"></script>

<?php
  }
?>


<script type="text/javascript" src="<?= base_url(); ?>harvee/plugins/easyui/jquery.easyui.min.js"></script>