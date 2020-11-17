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
                            <a href="<?php echo site_url('kasir/transaksis/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo site_url('kasir/transaksis/addNext') ?>" method="post" enctype="multipart/form-data" >              
                                <div class="form-group">
                                    <label>Kode barang &nbsp;&nbsp;: <?php echo $barang->kd_barang ?></label><br>
                                    <label>Nama barang &nbsp;: <?php echo $barang->nama_barang ?></label><br>
                                    <label>Harga barang &nbsp;: Rp. <?php echo number_format($barang->harga_barang) ?></label><br>
                                    <label>Stok barang &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $barang->stok_barang ?></label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Barang dibeli &nbsp;&nbsp;: <?php echo $lanjutan[1] ?></label><br>
                                    <label>Total harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format($lanjutan[1]*$barang->harga_barang) ?></label>
                                </div>


                                <input type="hidden" name="kd_barang" value="<?php echo $barang->kd_barang ?>">
                                <input type="hidden" name="kd_user" value="<?php echo decrypt_url($this->session->userdata("kode_user")); ?>">
                                <input type="hidden" name="jumlah_beli" value="<?php echo $lanjutan[1] ?>">
                                <input type="hidden" name="total_harga" value="<?php echo $lanjutan[1]*$barang->harga_barang ?>">
                                <input type="hidden" name="stok_barang" value="<?php echo $barang->stok_barang ?>">
                                
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan transaksi" />
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