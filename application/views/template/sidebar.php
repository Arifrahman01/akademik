<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Adaro</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?> " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Arif Rahman</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Master</li>
          <li class="nav-item " id="head_mahasiswa">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Mahasiswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('home/list_mahasiswa')?>" id="nav_list_mahasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('home/master_mahasiswa')?>" id="nav_master_mahasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Mahasiswa</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item " id="head_dosen">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Dosen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('home/list_dosen')?>" id="nav_list_dosen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('home/master_dosen')?>" id="nav_master_dosen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Dosen</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item " id="head_matakuliah">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Matakuliah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('home/list_matakuliah')?>" id="nav_list_matakuliah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Matakuliah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('home/master_matakuliah')?>" id="nav_master_matakuliah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Matakuliah</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-header">Perkuliahan</li>
          <li id="head_perkuliahann" class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Perkuliahan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="<?php echo base_url('home/perkuliahan')?>" id="nav_addkuliah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('home/list_perkuliahan')?>" id="nav_list_kuliah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Perkuliahan</p>
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