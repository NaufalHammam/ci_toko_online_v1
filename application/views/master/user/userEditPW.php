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

                    <h1 class="h3 mb-2 text-gray-800">Edit user</h1>
                    <?php $this->load->view('parts/breadcumb.php') ?>

                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('master/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">

                            <form action="" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?php echo $user->kd_user?>" />
                                <input type="hidden" name="nama" value="<?php echo $user->nama?>" />
                                <input type="hidden" name="username" value="<?php echo $user->username?>" />
                                <input type="hidden" name="level_user" value="<?php echo $user->level_user?>" />

                                
                                <div class="form-group">
                                    <label>Password lama</label>
                                    <input class="form-control <?php echo form_error('password_lama') ? 'is-invalid':'' ?>"
                                     type="password" name="password_lama" placeholder="Password lama" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password_lama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password baru</label>
                                    <input class="form-control <?php echo form_error('password_baru') ? 'is-invalid':'' ?>"
                                     type="password" name="password_baru" placeholder="Password baru" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password_baru') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi password baru</label>
                                    <input class="form-control <?php echo form_error('konfirmasi_password_baru') ? 'is-invalid':'' ?>"
                                     type="password" name="konfirmasi_password_baru" placeholder="Konfirmasi Password baru" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('konfirmasi_password_baru') ?>
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