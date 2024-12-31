<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url(); ?>harvee/dist/img/AdminLTELogo.png" alt="Application Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;&nbsp;Harvee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('/'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-bar text-primary"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('produksi'); ?>" class="nav-link">
              <i class="nav-icon fas fa-seedling text-green"></i>
              <p>
                Produksi
                <i class="right fas fa-angle-left text-green"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('produksi'); ?>" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Operasional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('mapsproduksi'); ?>" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Peta</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('restan'); ?>" class="nav-link">
              <i class="nav-icon fas fa-bell text-yellow"></i>
              <p>
                Restan
                <i class="right fas fa-angle-left text-yellow"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('restan'); ?>" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Operasional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Peta</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('sab'); ?>" class="nav-link">
              <i class="nav-icon fas fa-truck text-info"></i>
              <p>
                Surat Angkut Buah
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt text-orange"></i>
              <p>
                Berita Acara Restan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                QR Code
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('ktph'); ?>" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Kartu TPH</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Kartu Panen</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>