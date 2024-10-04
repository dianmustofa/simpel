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
                                <h3>Update Hasil Monitoring</h3>
                                <p class="text-subtitle text-muted">Update Hasil Monitoring</p>
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
                                        <h4 class="card-title">Update Hasil Monitoring</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Input Isu -->
                                                        <?php 
                                                            $jenis="";
                                                            if(isset($default['title_status_usulan'])) $jenis=$default['title_status_usulan'];
                                                        ?>
                                                        <div class="col-md-4">
                                                            <label>Status Monitoring</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_status_isu" id="title_status_isu">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                                                <?php if (!empty($level_status_usulan)): ?>
                                                                    <?php foreach ($level_status_usulan as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_status_usulan'], ENT_QUOTES, 'UTF-8') ?>">
                                                                            <?= htmlspecialchars($row['title_status_usulan'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Isu tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <!-- Group for Ditolak status inputs -->
                                                        <div class="col-md-4 verification-input" style="display:none;">
                                                            <label>Tanggal Realisasi Monitoring</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" style="display:none;">
                                                            <input type="text" class="form-control" name="fname" value="">
                                                        </div>
                                                        <div class="col-md-4 verification-input" style="display:none;">
                                                            <label>Realisasi Monitoring</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" style="display:none;">
                                                            <input type="text" class="form-control" name="fname" value="">
                                                        </div>
                                                        <div class="col-md-4 verification-input" style="display:none;">
                                                            <label>Keterangan Monitoring</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" style="display:none;">
                                                            <input type="text" class="form-control" name="fname" value="">
                                                        </div>

                                                        <div class="col-md-12 form-group comment-input" style="display:none;">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                            <textarea type="text" class="form-control" name="verification_text" id="exampleFormControlTextarea1" rows="3" placeholder="Berikan komentar anda"></textarea>
                                                        </div>

                                                        <script>
                                                            document.getElementById('title_status_isu').addEventListener('change', function() {
                                                                var selectedValue = this.value;
                                                                var verificationInputs = document.querySelectorAll('.verification-input');
                                                                var commentInput = document.querySelector('.comment-input');
                                                                
                                                                // Tampilkan atau sembunyikan semua elemen dengan kelas 'verification-input'
                                                                if (selectedValue === 'Dilaksanakan') {
                                                                    verificationInputs.forEach(function(input) {
                                                                        input.style.display = 'block';
                                                                    });
                                                                } else {
                                                                    verificationInputs.forEach(function(input) {
                                                                        input.style.display = 'none';
                                                                    });
                                                                }


                                                                // Tampilkan input komentar hanya jika status adalah "Tidak Dapat Dilaksanakan"
                                                                if (selectedValue === 'Tidak Dapat Dilaksanakan') {
                                                                    commentInput.style.display = 'block';
                                                                } else {
                                                                    commentInput.style.display = 'none';
                                                                }
                                                            });
                                                        </script>

                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Detail Riwayat Informasi</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form">
                                                <div class="row">
                                                    <div class="divider">
                                                        <div class="divider-text">Isu</div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Isu Lingkungan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_isu'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Kategori</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_kategori'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Jenis</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_jenis'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Pekerjaan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_pekerjaan'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Detail Pekerjaan</label>
                                                            <textarea type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Sumber</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_sumber'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Aset Lahan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_aset_lahan'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Kecamatan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Kelurahan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">No RW</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">No RT</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Latitude</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['latitude'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Longitude</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['longitude'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Alamat</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Tanggal Ajuan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['last_created_date'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="divider">
                                                        <div class="divider-text">Usulan</div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Detail Pekerjaan</label>
                                                            <textarea type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Detail Pekerjaan</label>
                                                            <textarea type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Detail Pekerjaan</label>
                                                            <textarea type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="You can't update me :P"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

            </div>

        </div>
    </div>
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>

</html>