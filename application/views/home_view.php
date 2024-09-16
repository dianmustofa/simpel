<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- end css -->
    
</head>

<body>
    <div id="app">

        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="main" class='layout-navbar'>

            <?php $this->load->view("_partials/headnav.php") ?>

            <div id="main-content">
                <section id="input-sizing">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group position-relative has-icon-left">
                                        <form method="get" action="<?= base_url('home') ?>">
                                            <input class="form-control form-control-lg" name="search" type="text" placeholder="Temukan Perencanaan" value="<?= $this->input->get('search'); ?>">
                                        </form>
                                        <div class="form-control-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Riwayat Perencanaan</h3>
                                <p class="text-subtitle text-muted">Berikut histori data informasi perencanaan lingkungan.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>auth" class="btn btn-primary">+ Ajukan Perencanaan</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Basic card section start -->
                    <section id="content-types">
                        <div class="row">

                        <?php if (!empty($ajuan)) { ?>

                            <?php foreach ($ajuan as $row) { 
                                $titleIsu = $row['title_isu'];
                                $latitude = $row['latitude'];
                                $longitude = $row['longitude'];
                                $statusIsu = $row['status_isu'];
                            ?>

                            <div class="col-xl-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $titleIsu ?></h4>
                                            <p class="card-text">
                                                Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet
                                                roll. Toffee
                                                sugar plum sugar plum jelly-o jujubes bonbon dessert carrot cake.
                                            </p>
                                        </div>
                                        <img class="img-fluid w-100" src="assets/images/samples/banana.jpg"
                                            alt="Card image cap">
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Status : <?= $statusIsu ?></span>
                                        <button class="btn btn-light-primary">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                        <?php } else { ?>
                            <div class="col-12">
                                <p class="text-center">Tidak ada data ditemukan.</p>
                            </div>
                        <?php } ?>

                        </div>
                    </section>
                    <!-- Basic Card types section end -->

                </div>

                <?php $this->load->view("_partials/footer.php") ?>

            </div>
        </div>
    </div>

    <!-- js -->
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- end js -->

</body>

</html>