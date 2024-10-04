<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Layout - Mazer Admin Dashboard</title>

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
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <div id="app">
        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="main" class='layout-navbar'>

            <?php $this->load->view("_partials/headnav.php") ?>

            <div id="main-content">
                <a href="<?php echo base_url();?>isu"><i class="bi bi-chevron-left"></i></a>
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Review Isu Perencanaan</h3>
                                <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Horizontal form layout section start -->
                    <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Review Isu Perencanaan</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Isu Lingkungan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_isu'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Kategori</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_kategori'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Jenis</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_jenis'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_pekerjaan'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Detail Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Sumber</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_sumber'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Aset Lahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_aset_lahan'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Kecamatan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Kelurahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No RW</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No RT</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Latitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['latitude'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Longitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['longitude'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Tanggal Upload</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['last_created_date'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Dokumentasi</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>

                                                        <!-- Input Isu -->
                                                        <div class="col-md-4">
                                                            <label>Instansi Tujuan</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($review_isu['title_instansi_pelaksana']) ? $review_isu['title_instansi_pelaksana'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="instansi_pelaksana_usulan">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Instansi Belum Dipilih">Instansi belum dipilih</option>
                                                                <?php if (!empty($level_instansi)): ?>
                                                                    <?php foreach ($level_instansi as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_instansi_pelaksana'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_instansi_pelaksana"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_instansi_pelaksana'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Instansi tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <!-- Input Isu -->
                                                        <div class="col-md-4">
                                                            <label>Status Review Isu</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($review_isu['title_status_isu']) ? $review_isu['title_status_isu'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="status_isu" id="title_status_isu">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                                                <?php if (!empty($level_status_isu)): ?>
                                                                    <?php foreach ($level_status_isu as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_status_isu'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_status_isu"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_status_isu'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Isu tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-12 form-group" id="verification_input" style="display:none;">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                            <textarea type="text" class="form-control" name="verification_text" id="exampleFormControlTextarea1" rows="3" placeholder="Berikan komentar anda"></textarea>
                                                        </div>

                                                        <script>
                                                            document.getElementById('title_status_isu').addEventListener('change', function() {
                                                                var selectedValue = this.value;
                                                                var verificationInput = document.getElementById('verification_input');
                                                                
                                                                if (selectedValue === 'Ditolak') {
                                                                    verificationInput.style.display = 'block';
                                                                } else {
                                                                    verificationInput.style.display = 'none';
                                                                }
                                                            });
                                                        </script>

                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Peta Lokasi</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div id="map"></div>

                                                    <!-- Tambahkan CSS untuk ukuran peta -->
                                                    <style>
                                                        #map {
                                                            height: 400px; /* Atur tinggi peta */
                                                        }
                                                    </style>
                                                    <script>
                                                        var map = L.map('map').setView([<?php echo $review_isu['latitude'];?>, <?php echo $review_isu['longitude'];?>], 15);

                                                        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                        // }).addTo(map);
                                                        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                                                                maxZoom: 20,
                                                                subdomains:['mt0','mt1','mt2','mt3']
                                                        }).addTo(map);


                                                        var marker = L.marker([<?php echo $review_isu['latitude'];?>, <?php echo $review_isu['longitude'];?>]).addTo(map)
                                                            .bindPopup('<?php echo $review_isu['title_isu'];?>')
                                                            .openPopup();


                                                    </script>
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