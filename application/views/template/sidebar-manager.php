
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url() . 'Home' ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text" >Data Master</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="<?php echo base_url() . 'Barang' ?>">Data Barang</a>
            </li>
            <li>
              <a href="<?php echo base_url() . 'Jenis_barang' ?>">Jenis Barang</a>
            </li>
            <li>
              <a href="<?php echo base_url() . 'Merek_barang' ?>">Merk Barang</a>
            </li>
            <li>
              <a href="<?php echo base_url() . 'Supplier' ?>">Suplier</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-folder-open"></i>
            <span class="nav-link-text">Data Transaksi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="<?php echo base_url() . 'Barang_masuk' ?>">Transaksi Barang Masuk</a>
            </li>
            <li>
              <a href="<?php echo base_url() . 'Barang_keluar' ?>">Transaksi Barang Keluar</a>
            </li>
            <li>
              <a href="<?php echo base_url() . 'Pemesanan' ?>">Pemesanan Ke Suplier</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a href="<?php echo base_url() . 'Auth/logout' ?>" class="nav-link" >
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Auth/logout' ?>" class="nav-link" >
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
       </ul>