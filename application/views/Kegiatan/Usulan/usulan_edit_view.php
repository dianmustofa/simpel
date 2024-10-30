<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONTER - Edit Usulan</title>

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
                <a href="<?php echo base_url();?>usulan"><i class="bi bi-chevron-left"></i></a>
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Edit Usulan</h3>
                                <p class="text-subtitle text-muted"></p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Usulan</li>
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
                                        <h4 class="card-title">Edit Usulan</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal" action="<?= site_url('usulan-update/'.$edit_usulan['id_isu']) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                    <?php if ($this->session->userdata('logged_in')) : ?>

                                                        <?php if ($this->session->userdata('id_level_akun') === '2') : ?>

                                                            <div class="col-md-4">
                                                                <label>Manfaat dan Tujuan</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea type="text" class="form-control" name="manfaat_tujuan_usulan" value="<?php echo isset($edit_usulan['manfaat_tujuan_usulan']) ? $edit_usulan['manfaat_tujuan_usulan'] : ''; ?>"><?php echo $edit_usulan['manfaat_tujuan_usulan'];?></textarea>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Indikasi Program</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea type="text" class="form-control" name="indikasi_program_usulan" value="<?php echo isset($edit_usulan['indikasi_program_usulan']) ? $edit_usulan['indikasi_program_usulan'] : ''; ?>"><?php echo $edit_usulan['indikasi_program_usulan'];?></textarea>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Kegiatan</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea type="text" class="form-control" name="program_usulan" value="<?php echo isset($edit_usulan['program_usulan']) ? $edit_usulan['program_usulan'] : ''; ?>" readonly><?php echo $edit_usulan['program_usulan'];?></textarea>
                                                            </div>
                                                            <!-- Input Isu -->
                                                            <div class="col-md-4">
                                                                <label>Instansi Pelaksana</label>
                                                            </div>
                                                            <?php 
                                                                $jenis = isset($edit_usulan['title_opd']) ? $edit_usulan['title_opd'] : '';
                                                            ?>
                                                            <div class="col-md-8 form-group">
                                                                <select class="choices form-select" name="title_opd">
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

                                                            <?php elseif ($this->session->userdata('id_level_akun') === '3') : ?>

                                                                <div class="col-md-4">
                                                                    <label>Manfaat dan Tujuan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea type="text" class="form-control" value="<?php echo $edit_usulan['manfaat_tujuan_usulan'];?>" readonly><?php echo $edit_usulan['manfaat_tujuan_usulan'];?></textarea>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Indikasi Program</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea type="text" class="form-control" name="fname" value="<?php echo $edit_usulan['indikasi_program_usulan'];?>" readonly><?php echo $edit_usulan['indikasi_program_usulan'];?></textarea>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Kegiatan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea type="text" class="form-control" name="program_usulan" value="<?php echo isset($edit_usulan['program_usulan']) ? $edit_usulan['program_usulan'] : ''; ?>" readonly><?php echo $edit_usulan['program_usulan'];?></textarea>
                                                                </div>

                                                                <!-- Input Pendanaan -->
                                                                <div class="col-md-4">
                                                                    <label>Sumber Pendanaan</label>
                                                                </div>
                                                                <?php 
                                                                    $jenis = isset($edit_usulan['sumber_pendanaan_usulan']) ? $edit_usulan['sumber_pendanaan_usulan'] : '';
                                                                ?>
                                                                <div class="col-md-8 form-group">
                                                                    <select class="choices form-select" name="sumber_pendanaan_usulan">
                                                                        <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                        <option value="Sumber Dana Belum Dipilih">Sumber dana belum dipilih</option>
                                                                        <?php if (!empty($level_sumber_pendanaan)): ?>
                                                                            <?php foreach ($level_sumber_pendanaan as $row): ?>
                                                                                <option value="<?= htmlspecialchars($row['title_sumber_pendanaan'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_sumber_pendanaan"] == $jenis) echo "selected";?>>
                                                                                    <?= htmlspecialchars($row['title_sumber_pendanaan'], ENT_QUOTES, 'UTF-8') ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        <?php else: ?>
                                                                            <option value="">Sumber dana tidak tersedia</option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label>Indikasi Tahun Pelaksanaan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea type="text" class="form-control" name="indikasi_tahun_pelaksana_usulan" value="<?php echo isset($edit_usulan['indikasi_tahun_pelaksana_usulan']) ? $edit_usulan['indikasi_tahun_pelaksana_usulan'] : ''; ?>"><?php echo $edit_usulan['indikasi_tahun_pelaksana_usulan'];?></textarea>
                                                                </div>
                                                                <!-- Input Status -->
                                                                <div class="col-md-4">
                                                                    <label>Status Usulan</label>
                                                                </div>
                                                                <?php 
                                                                    $jenis = isset($edit_usulan['status_usulan']) ? $edit_usulan['status_usulan'] : '';
                                                                ?>
                                                                <div class="col-md-8 form-group">
                                                                    <select class="choices form-select" name="status_usulan">
                                                                        <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                        <option value="Status Belum Dipilih">Status belum dipilih</option>
                                                                        <?php if (!empty($level_status_usulan)): ?>
                                                                            <?php foreach ($level_status_usulan as $row): ?>
                                                                                <option value="<?= htmlspecialchars($row['title_status_usulan'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_status_usulan"] == $jenis) echo "selected";?>>
                                                                                    <?= htmlspecialchars($row['title_status_usulan'], ENT_QUOTES, 'UTF-8') ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        <?php else: ?>
                                                                            <option value="">Status tidak tersedia</option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                </div>



                                                                <div class="col-md-12 form-group" id="verification_input" style="display:none;">
                                                                    <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                                    <textarea type="text" class="form-control" name="komentar_usulan" id="exampleFormControlTextarea1" rows="3" placeholder="Berikan komentar anda"></textarea>
                                                                </div>

                                                                <?php elseif ($this->session->userdata('id_level_akun') === '4') : ?>

                                                                    <div class="col-md-4">
                                                                        <label>Manfaat dan Tujuan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <textarea type="text" class="form-control" name="manfaat_tujuan_usulan" value="<?php echo isset($edit_usulan['manfaat_tujuan_usulan']) ? $edit_usulan['manfaat_tujuan_usulan'] : ''; ?>"><?php echo $edit_usulan['manfaat_tujuan_usulan'];?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Indikasi Program</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <textarea type="text" class="form-control" name="indikasi_program_usulan" value="<?php echo isset($edit_usulan['indikasi_program_usulan']) ? $edit_usulan['indikasi_program_usulan'] : ''; ?>"><?php echo $edit_usulan['indikasi_program_usulan'];?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Kegiatan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <textarea type="text" class="form-control" name="program_usulan" value="<?php echo isset($edit_usulan['program_usulan']) ? $edit_usulan['program_usulan'] : ''; ?>" readonly><?php echo $edit_usulan['program_usulan'];?></textarea>
                                                                    </div>

                                                                    <!-- Input Isu -->
                                                                    <!-- <div class="col-md-4">
                                                                        <label>Instansi Pelaksana</label>
                                                                    </div>
                                                                    <?php 
                                                                        $jenis = isset($edit_usulan['title_instansi_pelaksana']) ? $edit_usulan['title_instansi_pelaksana'] : '';
                                                                    ?>
                                                                    <div class="col-md-8 form-group">
                                                                        <select class="choices form-select" name="title_opd">
                                                                            <option value="Instansi Belum Dipilih">Instansi belum dipilih</option>
                                                                            <?php if (!empty($level_instansi)): ?>
                                                                                <?php foreach ($level_instansi as $row): ?>
                                                                                    <option value="<?= htmlspecialchars($row['title_opd'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_opd"] == $jenis) echo "selected";?>>
                                                                                        <?= htmlspecialchars($row['title_opd'], ENT_QUOTES, 'UTF-8') ?>
                                                                                    </option>
                                                                                <?php endforeach; ?>
                                                                            <?php else: ?>
                                                                                <option value="">Instansi tidak tersedia</option>
                                                                            <?php endif; ?>
                                                                        </select>
                                                                    </div> -->

                                                                    <div class="col-md-4">
                                                                        <label>Instansi Pelaksana</label>
                                                                    </div>
                                                                    <?php 
                                                                        $jenis = isset($edit_usulan['title_opd']) ? $edit_usulan['title_opd'] : '';
                                                                    ?>
                                                                    <div class="col-md-8 form-group">
                                                                        <select class="choices form-select" name="title_opd">
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

                                                                    <div class="col-md-12 form-group" id="verification_input" style="display:none;">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                                        <textarea type="text" class="form-control" name="komentar_usulan" id="exampleFormControlTextarea1" rows="3" placeholder="Berikan komentar anda"></textarea>
                                                                    </div>

                                                                <?php else : ?>

                                                                    <p>Silahkan Login</p>

                                                                    <?php endif; ?>

                                                    <?php else : ?>
                                                        <p>Silahkan Login</p>
                                                    <?php endif; ?>

                                                        <script>
                                                            document.getElementById('title_status_usulan').addEventListener('change', function() {
                                                                var selectedValue = this.value;
                                                                var verificationInput = document.getElementById('verification_input');
                                                                
                                                                if (selectedValue === 'Dilaksanakan bersyarat') {
                                                                    verificationInput.style.display = 'block';
                                                                } else {
                                                                    verificationInput.style.display = 'none';
                                                                }
                                                            });
                                                        </script>

                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Simpan</button>
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
                                                        var map = L.map('map').setView([<?php echo $edit_usulan['latitude'];?>, <?php echo $edit_usulan['longitude'];?>], 15);

                                                        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                        // }).addTo(map);
                                                        // L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                                                        //         maxZoom: 20,
                                                        //         subdomains:['mt0','mt1','mt2','mt3']
                                                        // }).addTo(map);

                                                        L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                                                            maxZoom: 20,
                                                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                                                        }).addTo(map);

                                                        L.Control.geocoder({
                                                            defaultMarkGeocode: false
                                                        }).on('markgeocode', function(e) {
                                                            var latlng = e.geocode.center;
                                                            L.marker(latlng).addTo(map1)
                                                                .bindPopup(e.geocode.name)
                                                                .openPopup();
                                                            map.setView(latlng, 16); // Zoom in ketika lokasi ditemukan
                                                        }).addTo(map);


                                                        var marker = L.marker([<?php echo $edit_usulan['latitude'];?>, <?php echo $edit_usulan['longitude'];?>]).addTo(map)
                                                            .bindPopup('<?php echo $edit_usulan['title_isu'];?>')
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
                                        <h4 class="card-title">Detail Isu dari Masayarakat</h4>
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
                                                                name="fname" value="<?php echo $edit_usulan['title_isu'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Kategori</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_kategori'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Jenis</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_jenis'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Pekerjaan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_pekerjaan'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Detail Pekerjaan</label>
                                                            <textarea type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['detail_pekerjaan'];?>"><?php echo $edit_usulan['detail_pekerjaan'];?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Sumber</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_sumber'];?>">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Aset Lahan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_aset_lahan'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Kecamatan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_kecamatan'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Kelurahan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_kelurahan'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">No RW</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_rw'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">No RT</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['title_rt'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Latitude</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['latitude'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Longitude</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['longitude'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Alamat</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['alamat_isu'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Tanggal Ajuan</label>
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $edit_usulan['last_created_date'];?>">
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