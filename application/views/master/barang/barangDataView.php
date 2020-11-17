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

                    <h1 class="h3 mb-2 text-gray-800">Tabel barang</h1>
                    
                    <?php $this->load->view('parts/breadcumb.php') ?>

                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

    
                    

                    <div class="card shadow mb-4">
                        
                        <div class="card-header py-3">    
                            <?php if($this->session->userdata("level") == 1){ ?>
                            <a href="<?php echo site_url('master/barangs/add') ?>"><i class="fas fa-plus"></i> Tambah barang</a>
                            <hr>
                            <?php } ?>
                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo site_url('master/barangs') ?>" method="post" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <label>Dari :</label>&nbsp;
                                        <input type="date" name="search_dari" class="form-control bg-light border-0 small"  aria-label="Search" aria-describedby="basic-addon2">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>Sampai :</label>&nbsp;&nbsp;&nbsp;
                                        <input type="date" name="search_sampai" class="form-control bg-light border-0 small"  aria-label="Search" aria-describedby="basic-addon2">
                                        &nbsp;&nbsp;&nbsp;
                                        <div class="form-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>&nbsp;&nbsp;&nbsp;Cari Tanggal masuk
                                            </button>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-success" href="<?php echo site_url('master/barangs') ?>"><i class="fas fa-sync-alt"></i> refresh</a>
                                    </div>
                                </form>
                                
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="text-align:center;">
                                        <tr>
                                            <th>Nama barang</th>
                                            <th>Nama merek</th>
                                            <th>Nama distributor</th>
                                            <th>Harga barang</th>
                                            <th>Stok barang</th>
                                            <th>Tanggal masuk</th>
                                            <th width="175px">Keterangan </th>
                                            <?php if($this->session->userdata("level") == 1){ ?>
                                            <th width="200px">#</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php 
                                            $hitung_total_data = count($barangs);
                                            if($hitung_total_data != 0){
                                                foreach ($barangs as $barang): 
                                            ?>
                                        <tr>
                                            <td><?php echo $barang->nama_barang ?></td>
                                            <td>
                                                <?php foreach ($mereks as $dataM): 
                                                        if($barang->kd_merek == $dataM->kd_merek){
                                                            echo $dataM->nama_merek;
                                                        }
                                                endforeach; ?>
                                            </td>
                                            <td>
                                                <?php foreach ($distributors as $dataD): 
                                                        if($barang->kd_distributor == $dataD->kd_distributor){
                                                            echo $dataD->nama_distributor;
                                                        }
                                                endforeach; ?>
                                            </td>
                                            <td>Rp. <?php echo number_format($barang->harga_barang) ?></td>
                                            <td><?php echo $barang->stok_barang ?></td>
                                            <td><?php echo $barang->tanggal_masuk ?></td>
                                            <td><?php echo $barang->keterangan ?></td>
                                            <?php if($this->session->userdata("level") == 1){ ?>
                                            <td>
                                                <a href="<?php echo site_url('master/barangs/edit/'.encrypt_url($barang->kd_barang)) ?>" class="btn btn-small"><i class="fas fa-edit fa-fw"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('master/barangs/delete/'.encrypt_url($barang->kd_barang)) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                            <?php } ?>
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