<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONTER - Usulan review</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <!-- Tambahkan script Leaflet -->
    <!-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" /> -->

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <!-- Leaflet Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <!-- Leaflet Geocoder JS -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <div id="app">
        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="main" class='layout-navbar'>

            <?php $this->load->view("_partials/headnav.php") ?>

            <div id="main-content">
                <a href="<?php echo base_url();?>laporan-tahunan"><i class="bi bi-chevron-left"></i></a>
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Edit Dokumen Pendukung CAP</h3>
                                <p class="text-subtitle text-muted"></p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Dokumen Pendukung CAP</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Horizontal form layout section start -->
                    <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Dokumen Pendukung CAP</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal" action="<?= site_url('laporan-update/'.$update_laporan['id_laporan']) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <?php if ($this->session->userdata('logged_in')) : ?>
                                                            <div class="col-md-4">
                                                                <label>Judul Dokumen</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea type="text" class="form-control" name="title_laporan" required><?php echo isset($update_laporan['title_laporan']) ? $update_laporan['title_laporan'] : ''; ?></textarea>
                                                            </div>

                                                            <!-- Input Kelurahan -->
                                                            <!-- <?php 
                                                                $jenis="";
                                                            if(isset($default['title_kelurahan'])) $jenis=$default['title_kelurahan'];
                                                            ?>
                                                            <div class="form-group">
                                                                <label>Kelurahan</label>
                                                                <select class="choices form-select" name="kelurahan_laporan" required>
                                                                    <option value="" disabled selected>Pilih Kelurahan</option>
                                                                    <?php if (!empty($level_kelurahan)): ?>
                                                                        <?php foreach ($level_kelurahan as $row): ?>
                                                                            <option value="<?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>">
                                                                                <?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <option value="">Kelurahan tidak tersedia</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div> -->

                                                            <div class="col-md-4">
                                                                <label>Kelurahan</label>
                                                            </div>
                                                            <?php 
                                                                $jenis = isset($update_laporan['kelurahan_laporan']) ? $update_laporan['kelurahan_laporan'] : '';
                                                            ?>
                                                            <div class="col-md-8 form-group">
                                                                <select class="choices form-select" name="kelurahan_laporan">
                                                                    <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                    <option value="Kelurahan Belum Dipilih">Kelurahan belum dipilih</option>
                                                                    <?php if (!empty($level_kelurahan)): ?>
                                                                        <?php foreach ($level_kelurahan as $row): ?>
                                                                            <option value="<?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_kelurahan"] == $jenis) echo "selected";?>>
                                                                                <?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <option value="">Kelurahan tidak tersedia</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <label>Tahun Laporan</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea type="text" class="form-control" name="tahun_laporan" required><?php echo isset($update_laporan['tahun_laporan']) ? $update_laporan['tahun_laporan'] : ''; ?></textarea>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Upload Dokumen</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <!-- Tampilkan dokumen lama jika ada -->
                                                                <?php if (!empty($update_laporan['document_laporan'])): ?>
                                                                    <p>Dokumen Lama: <a href="<?= base_url('uploads/documents/' . $update_laporan['document_laporan']) ?>" target="_blank"><?= $update_laporan['document_laporan'] ?></a></p>
                                                                <?php endif; ?>
                                                                <input type="file" class="form-control" name="document_laporan" accept=".pdf,.doc,.docx">
                                                                <small>Kosongkan jika tidak ingin mengubah dokumen</small>
                                                            </div>

                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Cancel</button>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>
                    <!-- // Basic Horizontal form layout section end -->

                </div>

            </div>

        </div>
    </div>
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>

</html>