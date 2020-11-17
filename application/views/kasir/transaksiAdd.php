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

                            <form action="<?php echo site_url('kasir/transaksis/add') ?>" method="post" enctype="multipart/form-data" >
                                

                                <div class="form-group">
                                    <label>Barang &nbsp;-&nbsp; Stok &nbsp;-&nbsp; Harga</label>
                                    <select name="kd_barang" class="form-control">
                                      <?php foreach ($barangs as $dataB): ?>
                                        <option value="<?php echo $dataB->kd_barang   ?>"><?php echo $dataB->kd_barang.' - '. $dataB->nama_barang. '&nbsp; - &nbsp;'. $dataB->stok_barang. '&nbsp; - &nbsp;Rp. '. number_format($dataB->harga_barang); ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kd_barang') ?>
                                    </div>
                                </div>

                                 

                                <div class="form-group">
                                    <label>Jumlah beli</label>
                                    <input class="form-control <?php echo form_error('jumlah_beli') ? 'is-invalid':'' ?>"
                                     type="number" name="jumlah_beli" placeholder="" required />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jumlah_beli') ?>
                                    </div>
                                </div>

                                <input class="btn btn-success" type="submit" name="btn" value="Next" />
                            </form>

                        </div>

                        <div class="card-footer small text-muted">
                            * required fields
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