<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('parts/header.php') ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('parts/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('parts/navbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                            <a href="#" onclick="belumTersedia()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>

                        <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-primary" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('danger')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('berhasil')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('berhasil'); ?>
                        </div>
                        <?php endif; ?>

                        <!-- Content Row -->
                        <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Merek</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-apple fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('master/mereks'); ?>"></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Distributor</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('master/distributors'); ?>"></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Admin </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">User</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('master/users'); ?>"></a>
                            </div>
                        </div>
                       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Admin / Manager</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Laporan Barang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('master/barangs'); ?>"></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Manager / Kasir</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Laporan Transaksi</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('kasir/transaksis'); ?>"></a>
                            </div>
                        </div>
                            
                            
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Manager</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Laporan Master</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('manager/laporanmasters'); ?>"></a>
                            </div>
                        </div>

                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Manager</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Laporan Transaksi</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <a class="small text-white stretched-link" href="<?php echo site_url('manager/laporantransaksis'); ?>"></a>
                            </div>
                        </div>

                            

                        </div>
                </div>
               
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('parts/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view('parts/scrolltop.php') ?>

    <!-- Logout Modal-->
    <?php $this->load->view('parts/modal.php') ?>

    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view('parts/js.php') ?>
<script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
</body>

</html>