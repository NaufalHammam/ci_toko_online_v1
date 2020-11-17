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

                    <h1 class="h3 mb-2 text-gray-800">Tabel laporan Transaksi</h1>
                    <?php $this->load->view('parts/breadcumb.php') ?>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

    

                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="text-align:center;">
                                        <tr>
                                            <th>Nama pengguna</th>
                                            <th>Kegiatan</th>
                                            <th>Waktu kegiatan</th>
                                            <th width="75px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php 
                                            $hitung_total_data = count($laporantransaksis);
                                            if($hitung_total_data != 0){
                                                foreach ($laporantransaksis as $laporan): 
                                            ?>
                                        <tr>
                                            <td>
                                                <?php foreach ($users as $dataU): 
                                                        if($laporan->kd_user == $dataU->kd_user){
                                                            echo $dataU->nama;
                                                        }
                                                endforeach; ?>
                                            </td>
                                            
                                            <td><?php echo substr($laporan->kegiatan, 0, 25) ?>...</td>
                                            <td><?php echo $laporan->waktu_kegiatan ?></td>
                                            <td>
                                                <a href="<?php echo site_url('manager/laporantransaksis/view/'.encrypt_url($laporan->kd_laporan_transaksi)) ?>" class="btn btn-small text-primary"><i class="far fa-eye fa-fw"></i> View</a>

                                            </td>
                                            
                                        </tr>
                                        <?php 
                                                endforeach; 
                                            }
                                        ?>
                                    </tbody>
                                </table>
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

</script>
</body>

</html>