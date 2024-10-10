<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
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
                        <!-- <div class="card-body">
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
                        </div> -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group position-relative has-icon-left">
                                        <form method="get" action="<?= base_url('home') ?>">
                                            <div class="form-group position-relative has-icon-left">
                                                <input class="form-control form-control-lg" name="search" type="text" placeholder="Temukan Perencanaan" value="<?= $this->input->get('search'); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-search"></i>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <!-- Filter Kelurahan -->
                                    <select class="form-control form-control-lg" name="kelurahan">
                                        <option value="">Pilih Kelurahan</option>
                                        <option value="Menteng Dalam" <?= ($this->input->get('kelurahan') == 'Menteng Dalam') ? 'selected' : ''; ?>>Menteng Dalam</option>
                                        <option value="Gambir" <?= ($this->input->get('kelurahan') == 'Gambir') ? 'selected' : ''; ?>>Gambir</option>
                                        <!-- Tambahkan opsi kelurahan lainnya -->
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <!-- Filter RW -->
                                    <select class="form-control form-control-lg" name="rw">
                                        <option value="">Pilih RW</option>
                                        <option value="013" <?= ($this->input->get('rw') == '013') ? 'selected' : ''; ?>>RW 013</option>
                                        <option value="001" <?= ($this->input->get('rw') == '001') ? 'selected' : ''; ?>>RW 001</option>
                                        <!-- Tambahkan opsi RW lainnya -->
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <!-- Filter RT -->
                                    <select class="form-control form-control-lg" name="rt">
                                        <option value="">Pilih RT</option>
                                        <option value="005" <?= ($this->input->get('rt') == '005') ? 'selected' : ''; ?>>RT 005</option>
                                        <option value="009" <?= ($this->input->get('rt') == '009') ? 'selected' : ''; ?>>RT 009</option>
                                        <!-- Tambahkan opsi RT lainnya -->
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Filter</button>
                                </div>
                            </div>

                            </form>
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
                                    <?php if ($this->session->userdata('logged_in')) : ?>
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>isu" class="btn btn-primary">+ Ajukan Perencanaan</a></li>
                                        <?php else : ?>
                                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>auth" class="btn btn-primary">+ Ajukan Perencanaan</a></li>
                                            <?php endif; ?>
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
                                $idIsu = $row['id_isu'];
                                $titleIsu = $row['title_isu'];
                                $latitude = $row['latitude'];
                                $longitude = $row['longitude'];
                                $statusIsu = $row['status_isu'];
                                $gambarIsu = $row['gambar'];
                                $detailPekerjaan = $row['detail_pekerjaan'];
                            ?>

                            <div class="col-xl-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $titleIsu ?></h4>
                                            <p class="card-text">
                                                <?= $detailPekerjaan ?>
                                            </p>
                                        </div>
                                        <img class="img-fluid w-100" src="<?php echo base_url();?>assets/images/samples/<?= $gambarIsu ?>"
                                            alt="Card image cap">
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Status : <?= $statusIsu ?></span>
                                        
                                        <a href="<?php echo base_url(); ?>home/details/<?= $idIsu ?>"><button class="btn btn-light-primary">Lihat Detail</button></a>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                            <!-- Tampilkan link pagination -->
                            <div class="col-12">
                                <?= $pagination ?>
                            </div>

                        <?php } else { ?>
                            <div class="col-12">
                                <p class="text-center">Tidak ada data ditemukan.</p>
                            </div>
                        <?php } ?>

                        </div>
                    </section>
                    <!-- Basic Card types section end -->

                </div>


            </div>
        </div>
    </div>

    <!-- js -->
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->

</body>

</html>