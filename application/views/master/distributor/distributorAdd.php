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

                    <h1 class="h3 mb-2 text-gray-800">Tambah distributor</h1>
                    <?php $this->load->view('parts/breadcumb.php') ?>

                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('master/distributors/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo site_url('master/distributors/add') ?>" method="post" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Nama distributor</label>
                                    <input class="form-control <?php echo form_error('nama_distributor') ? 'is-invalid':'' ?>"
                                     type="text" name="nama_distributor" placeholder="Nama distributor" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_distributor') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Alamat distributor</label>
                                    <textarea class="form-control <?php echo form_error('alamat_distributor') ? 'is-invalid':'' ?>"
                                     name="alamat_distributor" placeholder="alamat distributor..." required></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat_distributor') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>No telepon</label>
                                    <input maxlength="15" class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>"
                                     type="text" name="no_telp" placeholder="No telepon distributor" required />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_telp') ?>
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