        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('test/overview'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">N.H.A <sup>11806792</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/overview'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo $this->uri->segment(1) == 'master' ? 'active': '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tabel master</h6>
                        
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'mereks' ? 'active': '' ?>" href="<?php echo site_url('master/mereks') ?>">Merek</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'distributors' ? 'active': '' ?>" href="<?php echo site_url('master/distributors') ?>">Distributor</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'users' ? 'active': '' ?>" href="<?php echo site_url('master/users') ?>">User</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'barangs' ? 'active': '' ?>" href="<?php echo site_url('master/barangs') ?>">Barang</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'transaksis' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('kasir/transaksis'); ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Transaksi</span></a>
            </li>


             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?php echo $this->uri->segment(1) == 'manager' ? 'active': '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-signature"></i>
                    <span>Manager</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tabel Laporan</h6>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'laporanmasters' ? 'active': '' ?>" href="<?php echo site_url('manager/laporanmasters') ?>">Semua laporan master</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'laporantransaksis' ? 'active': '' ?>" href="<?php echo site_url('manager/laporantransaksis') ?>">Semua laporan Transaksi</a>
                        
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>