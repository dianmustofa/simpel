<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>SIMONTER - Home</title>
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
                                <!-- <div class="col-sm-3">
                                    Filter Kelurahan
                                    <select class="form-control form-control-lg" name="kelurahan">
                                        <option value="">Pilih Kelurahan</option>
                                        <option value="Menteng Dalam" <?= ($this->input->get('kelurahan') == 'Menteng Dalam') ? 'selected' : ''; ?>>Menteng Dalam</option>
                                        <option value="Gambir" <?= ($this->input->get('kelurahan') == 'Gambir') ? 'selected' : ''; ?>>Gambir</option>
                                        Tambahkan opsi kelurahan lainnya
                                    </select>
                                </div> -->

                                <div class="col-sm-3">
                                    <!-- <label>Filter Kelurahan</label> -->
                                    <select class="form-control form-control-lg" name="kelurahan">
                                        <option value="">Pilih Kelurahan</option>
                                        <?php if (!empty($level_kelurahan)): ?>
                                            <?php foreach ($level_kelurahan as $row): ?>
                                                <option value="<?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>" 
                                                    <?= ($this->input->get('kelurahan') == $row['title_kelurahan']) ? 'selected' : ''; ?>>
                                                    <?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Kelurahan tidak tersedia</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <!-- <label>Filter Kelurahan</label> -->
                                    <select class="form-control form-control-lg" name="rw">
                                        <option value="">Pilih RW</option>
                                        <?php if (!empty($level_angka)): ?>
                                            <?php foreach ($level_angka as $row): ?>
                                                <option value="<?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>" 
                                                    <?= ($this->input->get('rw') == $row['title_angka']) ? 'selected' : ''; ?>>
                                                    RW <?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">RW tidak tersedia</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <!-- <label>Filter Kelurahan</label> -->
                                    <select class="form-control form-control-lg" name="rt">
                                        <option value="">Pilih RT</option>
                                        <?php if (!empty($level_angka)): ?>
                                            <?php foreach ($level_angka as $row): ?>
                                                <option value="<?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>" 
                                                    <?= ($this->input->get('rt') == $row['title_angka']) ? 'selected' : ''; ?>>
                                                    RT <?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">RT tidak tersedia</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <!-- <label>Filter Kelurahan</label> -->
                                    <select class="form-control form-control-lg" name="year">
                                        <option value="">Pilih Tahun</option>
                                        <?php if (!empty($level_year)): ?>
                                            <?php foreach ($level_year as $row): ?>
                                                <option value="<?= htmlspecialchars($row['title_year'], ENT_QUOTES, 'UTF-8') ?>" 
                                                    <?= ($this->input->get('year') == $row['title_year']) ? 'selected' : ''; ?>>
                                                    Tahun <?= htmlspecialchars($row['title_year'], ENT_QUOTES, 'UTF-8') ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Tahun tidak tersedia</option>
                                        <?php endif; ?>
                                    </select>
                                </div>


                                <!-- <div class="col-sm-3"> -->
                                    <!-- Filter RW -->
                                    <!-- <select class="form-control form-control-lg" name="rw">
                                        <option value="">Pilih RW</option>
                                        <option value="013" <?= ($this->input->get('rw') == '013') ? 'selected' : ''; ?>>RW 013</option>
                                        <option value="001" <?= ($this->input->get('rw') == '001') ? 'selected' : ''; ?>>RW 001</option> -->
                                        <!-- Tambahkan opsi RW lainnya -->
                                    <!-- </select>
                                </div> -->
                                <!-- <div class="col-sm-3"> -->
                                    <!-- Filter RT -->
                                    <!-- <select class="form-control form-control-lg" name="rt">
                                        <option value="">Pilih RT</option>
                                        <option value="005" <?= ($this->input->get('rt') == '005') ? 'selected' : ''; ?>>RT 005</option>
                                        <option value="009" <?= ($this->input->get('rt') == '009') ? 'selected' : ''; ?>>RT 009</option> -->
                                        <!-- Tambahkan opsi RT lainnya -->
                                    <!-- </select>
                                </div> -->
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
                                        <?php if ($this->session->userdata('id_level_akun') === '1') : ?>
                                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>isu" class="btn btn-primary">+ Ajukan Kegiatan</a></li>
                                            <?php elseif (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>isu" class="btn btn-primary">+ Ajukan Kegiatan</a></li>
                                                <?php elseif ($this->session->userdata('id_level_akun') === '3') : ?>
                                                    <?php else : ?>
                                                        <?php endif; ?>
                                    <?php else : ?>
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>auth" class="btn btn-primary">+ Ajukan Kegiatan</a></li>
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
                                $titleJenis = $row['title_jenis'];
                                $latitude = $row['latitude'];
                                $longitude = $row['longitude'];
                                $statusIsu = $row['status_isu'];
                                $statusUsulan = $row['status_usulan'];
                                $statusMonitoring = $row['status_monitoring'];
                                $titleOPD = $row['title_opd'];
                                $alamatIsu = $row['alamat_isu'];
                                $kelurahan = $row['title_kelurahan'];
                                $RW = $row['title_rw'];
                                $RT = $row['title_rt'];
                                $gambarIsu = $row['gambar_isu'];
                                $gambarMonitoring = $row['gambar_monitoring'];
                                $detailPekerjaan = $row['detail_pekerjaan'];
                            ?>

                            <div class="col-xl-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $titleJenis ?></h4>
                                            <p class="card-text">
                                                <?= $alamatIsu ?> Kelurahan <?= $kelurahan ?> RW <?= $RW ?> RT <?= $RT ?>
                                            </p>
                                        </div>
                                        <?php if ($gambarMonitoring != NULL) : ?>
                                            <img class="img-fluid w-100" src="<?php echo base_url();?>uploads/images/<?= $gambarMonitoring ?>" alt="Tidak Ada gambar">
                                            <?php elseif ($gambarIsu != Null) : ?>
                                                <img class="img-fluid w-100" src="<?php echo base_url();?>uploads/images/<?= $gambarIsu ?>" alt="Tidak Ada gambar">
                                                <?php else : ?>
                                                    <img class="img-fluid w-100" src="<?php echo base_url();?>uploads/images/default.jpg" alt="Tidak Ada gambar">
                                                    <?php endif; ?>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                    <?php if ($statusMonitoring === "Dilaksanakan" || $statusMonitoring === "Tidak dapat dilaksanakan") : ?>
                                        <span>Status : <?= $statusMonitoring ?></span>
                                    <?php elseif ($statusUsulan === "Dilaksanakan" || $statusUsulan === "Dilaksanakan bersyarat") : ?>
                                        <span>Status : <?= $statusUsulan ?></span>
                                        <?php elseif ($statusIsu === "Dilanjutkan") : ?>
                                            <span>Status : <?= $statusIsu ?></span>
                                            <?php elseif ($titleOPD != NULL) : ?>
                                                <span>Proses Verifikasi SKPD</span>
                                                <?php else : ?>
                                                <span>Menunggu Konfirmasi</span>
                                                <?php endif; ?>
                                            
                                        
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