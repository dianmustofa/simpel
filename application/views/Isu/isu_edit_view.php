<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONTER - Isu Lingkungan review</title>

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
                <a href="<?php echo base_url();?>isu"><i class="bi bi-chevron-left"></i></a>
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Edit Isu Lingkungan</h3>
                                <p class="text-subtitle text-muted"></p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Isu Lingkungan</li>
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
                                        <h4 class="card-title">Edit Isu Lingkungan</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal" action="<?= site_url('isu-update/'.$edit_isu['id_isu']) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <label>Aspek</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_aspek']) ? $edit_isu['title_aspek'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_aspek">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Aspek Belum Dipilih">Aspek belum dipilih</option>
                                                                <?php if (!empty($level_aspek)): ?>
                                                                    <?php foreach ($level_aspek as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_aspek'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_aspek"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_aspek'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Aspek tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <label>Isu Lingkungan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" class="form-control"
                                                                name="title_isu" value="<?php echo isset($edit_isu['title_isu']) ? $edit_isu['title_isu'] : ''; ?>">
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>Isu Lingkungan</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_isu']) ? $edit_isu['title_isu'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_isu">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Isu Belum Dipilih">Isu belum dipilih</option>
                                                                <?php if (!empty($level_isu)): ?>
                                                                    <?php foreach ($level_isu as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_isu'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_isu"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_isu'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Isu tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        
                                                        <!-- <div class="col-md-4">
                                                            <label>Kategori</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_kategori" value="<?php echo isset($edit_isu['title_kategori']) ? $edit_isu['title_kategori'] : ''; ?>">
                                                        </div> -->
                                                        <!-- <div class="col-md-4">
                                                            <label>Program</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_jenis" value="<?php echo isset($edit_isu['title_jenis']) ? $edit_isu['title_jenis'] : ''; ?>">
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>Pekerjaan</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_pekerjaan']) ? $edit_isu['title_pekerjaan'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_pekerjaan">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Pekerjaan Belum Dipilih">Pekerjaan belum dipilih</option>
                                                                <?php if (!empty($level_pekerjaan)): ?>
                                                                    <?php foreach ($level_pekerjaan as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_pekerjaan'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_pekerjaan"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_pekerjaan'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Pekerjaan tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Kegiatan</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_jenis']) ? $edit_isu['title_jenis'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_jenis">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Isu Belum Dipilih">Kegiatan belum dipilih</option>
                                                                <?php if (!empty($level_jenis)): ?>
                                                                    <?php foreach ($level_jenis as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_jenis'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_jenis"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_jenis'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Kegiatan tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <!-- <div class="col-md-4">
                                                            <label>Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_pekerjaan" value="<?php echo isset($edit_isu['title_pekerjaan']) ? $edit_isu['title_pekerjaan'] : ''; ?>">
                                                        </div> -->

                                                        

                                                        <div class="col-md-4">
                                                            <label>Detail Kegiatan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="program_usulan" value="<?php echo isset($edit_isu['program_usulan']) ? $edit_isu['program_usulan'] : ''; ?>" >
                                                        </div>


                                                        <div class="col-md-4">
                                                            <label>Detail</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="detail_pekerjaan" value="<?php echo isset($edit_isu['detail_pekerjaan']) ? $edit_isu['detail_pekerjaan'] : ''; ?>" >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Volume</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="volume_pekerjaan" value="<?php echo isset($edit_isu['volume_pekerjaan']) ? $edit_isu['volume_pekerjaan'] : ''; ?>" >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Satuan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="satuan" value="<?php echo isset($edit_isu['satuan']) ? $edit_isu['satuan'] : ''; ?>" >
                                                        </div>

                                                        <!-- <div class="col-md-4">
                                                            <label>Aset Lahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_aset_lahan" value="<?php echo isset($edit_isu['title_aset_lahan']) ? $edit_isu['title_aset_lahan'] : ''; ?>">
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>Aset Lahan</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_aset_lahan']) ? $edit_isu['title_aset_lahan'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_aset_lahan">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Aset Lahan Belum Dipilih">Aset Lahan belum dipilih</option>
                                                                <?php if (!empty($level_aset_lahan)): ?>
                                                                    <?php foreach ($level_aset_lahan as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_aset_lahan'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_aset_lahan"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_aset_lahan'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Aset Lahan tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <label>Kecamatan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_kecamatan" value="<?php echo isset($edit_isu['title_kecamatan']) ? $edit_isu['title_kecamatan'] : ''; ?>">
                                                        </div> -->
                                                        <!-- <div class="col-md-4">
                                                            <label>Kelurahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_kelurahan" value="<?php echo isset($edit_isu['title_kelurahan']) ? $edit_isu['title_kelurahan'] : ''; ?>">
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>Kelurahan</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_kelurahan']) ? $edit_isu['title_kelurahan'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_kelurahan">
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

                                                        <!-- <div class="col-md-4">
                                                            <label>No RW</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_rw" value="<?php echo isset($edit_isu['title_rw']) ? $edit_isu['title_rw'] : ''; ?>">
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>No RW</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_rw']) ? $edit_isu['title_rw'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_rw">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="RW Belum Dipilih">RW belum dipilih</option>
                                                                <?php if (!empty($level_angka)): ?>
                                                                    <?php foreach ($level_angka as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_angka"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">RW tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>No RT</label>
                                                        </div>
                                                        <?php 
                                                            $jenis = isset($edit_isu['title_rt']) ? $edit_isu['title_rt'] : '';
                                                        ?>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="title_rt">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="RT Belum Dipilih">RT belum dipilih</option>
                                                                <?php if (!empty($level_angka)): ?>
                                                                    <?php foreach ($level_angka as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_angka"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_angka'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">RT tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        
                                                        <!-- <div class="col-md-4">
                                                            <label>No RT</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_rt" value="<?php echo isset($edit_isu['title_rt']) ? $edit_isu['title_rt'] : ''; ?>">
                                                        </div> -->
                                                        <div class="col-md-4">
                                                            <label>Alamat</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="alamat_isu" value="<?php echo isset($edit_isu['alamat_isu']) ? $edit_isu['alamat_isu'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Peta Lokasi</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div>
                                                                <style>
                                                                    #map {
                                                                        height: 400px;
                                                                    }
                                                                </style>
                                                                <div id="map"></div>

                                                                <script>
                                                                    var map = L.map('map').setView([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>], 15);

                                                                    L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                                                                        maxZoom: 20,
                                                                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                                                                    }).addTo(map);

                                                                    L.Control.geocoder({
                                                                        defaultMarkGeocode: false
                                                                    }).on('markgeocode', function(e) {
                                                                        var latlng = e.geocode.center;
                                                                        L.marker(latlng).addTo(map)
                                                                            .bindPopup(e.geocode.name)
                                                                            .openPopup();
                                                                        map.setView(latlng, 16);
                                                                    }).addTo(map);

                                                                    // Menambahkan marker awal
                                                                    var initialMarker = L.marker([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>]).addTo(map)
                                                                        .bindPopup('<?php echo $edit_isu['title_isu'];?>')
                                                                        .openPopup();

                                                                    var marker = null;
                                                                    // Event listener untuk menangkap klik pada peta
                                                                    map.on('click', function(e) {
                                                                        var lat = e.latlng.lat;
                                                                        var lng = e.latlng.lng;

                                                                        document.getElementById('latitudeInput').value = lat.toFixed(5);
                                                                        document.getElementById('longitudeInput').value = lng.toFixed(5);

                                                                        // // Perbarui nilai latitude dan longitude pada label
                                                                        // document.getElementById('latitudeValue').innerText = lat.toFixed(5);
                                                                        // document.getElementById('longitudeValue').innerText = lng.toFixed(5);

                                                                        // Jika marker sudah ada, hapus marker sebelumnya
                                                                        if (marker) {
                                                                            map.removeLayer(marker);
                                                                        }

                                                                        // Tambahkan marker baru pada posisi yang diklik
                                                                        marker = L.marker([lat, lng]).addTo(map)
                                                                            .bindPopup('Marker baru: ' + lat.toFixed(5) + ', ' + lng.toFixed(5))
                                                                            .openPopup();

                                                                        // // Tambahkan marker baru pada posisi yang diklik
                                                                        // marker = L.marker([lat, lng]).addTo(map);
                    
                                                                    });


                                                                    // var marker = L.marker([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>]).addTo(map)
                                                                    //     .bindPopup('<?php echo $edit_isu['title_isu'];?>')
                                                                    //     .openPopup();

                                                                    
                                                                </script>
                                                            </div>
                                                        </div>

                                                        <!-- <label for="latitude">Latitude : <span id="latitudeValue"></span></label>
                                                        <input type="hidden" name="latitude" id="latitudeInput" required readonly><br>
                                                        <label for="longitude">Longitude : <span id="longitudeValue"></span></label>
                                                        <input type="hidden" name="longitude" id="longitudeInput" required readonly><br> -->

                                                        <!-- <div class="col-md-4">
                                                            <label>Latitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="latitude" value="<?php echo isset($edit_isu['latitude']) ? $edit_isu['latitude'] : ''; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Longitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="longitude" value="<?php echo isset($edit_isu['longitude']) ? $edit_isu['longitude'] : ''; ?>" readonly>
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label for="latitude">Latitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="latitude" id="latitudeInput" value="<?php echo isset($edit_isu['latitude']) ? $edit_isu['latitude'] : ''; ?>" >
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="longitude">Longitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="longitude" id="longitudeInput" value="<?php echo isset($edit_isu['longitude']) ? $edit_isu['longitude'] : ''; ?>" >
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <label>Tanggal Upload</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="last_created_date" value="<?php echo isset($edit_isu['last_created_date']) ? $edit_isu['last_created_date'] : ''; ?>" readonly>
                                                        </div>
                                                     
                                                        <!-- Input Isu -->
                                                        <div class="col-md-4">
                                                            <label>Instansi Tujuan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_opd" value="<?php echo isset($edit_isu['title_opd']) ? $edit_isu['title_opd'] : ''; ?>" readonly>
                                                        </div>

                                                        <!-- Input Isu -->
                                                        <div class="col-md-4">
                                                            <label>Status Review Isu</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="status_usulan" value="<?php echo isset($edit_isu['status_usulan']) ? $edit_isu['status_usulan'] : ''; ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Komentar</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <textarea type="text" class="form-control" name="komentar_usulan" id="exampleFormControlTextarea1" rows="3" readonly><?php echo isset($edit_isu['komentar_usulan']) ? $edit_isu['komentar_usulan'] : ''; ?></textarea>
                                                        </div>

                                                        <!-- <div class="col-md-12 form-group">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                            <textarea type="text" class="form-control" name="komentar_usulan" id="exampleFormControlTextarea1" rows="3" readonly><?php echo isset($edit_isu['komentar_usulan']) ? $edit_isu['komentar_usulan'] : ''; ?></textarea>
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>Upload Gambar</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <?php if (!empty($edit_isu['gambar_isu'])): ?>
                                                                <p>Gambar Lama: <a href="<?= base_url('uploads/images/' . $edit_isu['gambar_isu']) ?>" target="_blank"><?= $edit_isu['gambar_isu'] ?></a></p>
                                                            <?php endif; ?>
                                                            <input type="file" class="form-control" name="gambar_isu" accept="image/*">
                                                            <small>Kosongkan jika tidak ingin mengubah gambar</small>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Upload Dokumen</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <?php if (!empty($edit_isu['document_isu'])): ?>
                                                                <p>Dokumen Lama: <a href="<?= base_url('uploads/documents/' . $edit_isu['document_isu']) ?>" target="_blank"><?= $edit_isu['document_isu'] ?></a></p>
                                                            <?php endif; ?>
                                                            <input type="file" class="form-control" name="document_isu" accept=".pdf,.doc,.docx">
                                                            <small>Kosongkan jika tidak ingin mengubah dokumen</small>
                                                        </div>

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
                            
                            <!-- <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Peta Lokasi</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div id="map"></div>

                                                    <style>
                                                        #map {
                                                            height: 400px;
                                                        }
                                                    </style>
                                                    <script>
                                                        var map = L.map('map').setView([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>], 15);

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
                                                            map.setView(latlng, 16);
                                                        }).addTo(map);


                                                        var marker = L.marker([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>]).addTo(map)
                                                            .bindPopup('<?php echo $edit_isu['title_isu'];?>')
                                                            .openPopup();


                                                    </script>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

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