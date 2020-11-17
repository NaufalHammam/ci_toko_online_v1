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

                    <h1 class="h3 mb-2 text-gray-800">Tambah transaksi</h1>
                    <?php $this->load->view('parts/breadcumb.php') ?>

                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('manager/laporantransaksis/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table ">
                                    <tr>
                                        <td width="150px">Nama pengguna</td>
                                        <td width="25px"> : </td>
                                        <td> <?php echo $user->nama ?> </td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Kegiatan</td>
                                        <td width="25px"> : </td>
                                        <td> <?php echo $laporantransaksi->kegiatan ?> </td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Waktu kegiatan</td>
                                        <td width="25px"> : </td>
                                        <td> <?php echo $laporantransaksi->waktu_kegiatan ?> </td>
                                    </tr>
                                </table>
                            </div>
                                
                            </form>
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

</body>

</html>