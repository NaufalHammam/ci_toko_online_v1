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

                    <h1 class="h3 mb-2 text-gray-800">Tambah barang</h1>
                    <?php $this->load->view('parts/breadcumb.php') ?>

                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('master/barangs/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo site_url('master/barangs/add') ?>" method="post" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Nama barang</label>
                                    <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                                     type="text" name="nama_barang" placeholder="Nama barang" required />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_barang') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Merek</label>
                                    <select name="kd_merek" class="form-control">
                                      <?php foreach ($mereks as $dataM): ?>
                                        <option value="<?php echo $dataM->kd_merek   ?>"><?php echo $dataM->kd_merek. ' - '. $dataM->nama_merek; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kd_merek') ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Distributor</label>
                                    <select name="kd_distributor" class="form-control">
                                      <?php foreach ($distributors as $dataD): ?>
                                        <option value="<?php echo $dataD->kd_distributor ?>"><?php echo $dataD->kd_distributor. ' - '. $dataD->nama_distributor; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kd_distributor') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal masuk</label>
                                    <input class="form-control <?php echo form_error('tanggal_masuk') ? 'is-invalid':'' ?>"
                                     type="date" name="tanggal_masuk" placeholder="Tanggal masuk" required />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_masuk') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Harga barang</label>
                                    <input class="form-control <?php echo form_error('harga_barang') ? 'is-invalid':'' ?>"
                                     type="number" name="harga_barang" placeholder="Harga barang" required />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('harga_barang') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>stok barang</label>
                                    <input class="form-control <?php echo form_error('stok_barang') ? 'is-invalid':'' ?>"
                                     type="number" name="stok_barang" placeholder="stok barang" required />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('stok_barang') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Keterangan</label>
                                    <textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
                                     name="keterangan" placeholder="keterangan... " required></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('keterangan') ?>
                                    </div>
                                </div>



                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
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