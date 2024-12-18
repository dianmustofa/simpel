<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONTER - Edit Monitoring</title>

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
                <a href="<?php echo base_url();?>monitoring"><i class="bi bi-chevron-left"></i></a>
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Edit Monitoring</h3>
                                <p class="text-subtitle text-muted">Edit Monitoring</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Monitoring</li>
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
                                        <h4 class="card-title">Edit Monitoring</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal" action="<?= site_url('monitoring-update/'.$edit_monitoring['id_isu']) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Input Isu -->
                                                        <?php 
                                                            $jenis = isset($edit_monitoring['status_monitoring']) ? $edit_monitoring['status_monitoring'] : '';
                                                        ?>
                                                        <div class="col-md-4">
                                                            <label>Status Monitoring</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <select class="choices form-select" name="status_monitoring" id="title_status_monitoring">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                                                <?php if (!empty($level_status_monitoring)): ?>
                                                                    <?php foreach ($level_status_monitoring as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['title_status_monitoring'], ENT_QUOTES, 'UTF-8') ?>" <?php if($row["title_status_monitoring"] == $jenis) echo "selected";?>>
                                                                            <?= htmlspecialchars($row['title_status_monitoring'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Status tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <!-- Group for Ditolak status inputs -->
                                                        <div class="col-md-4 verification-input" style="display:none;">
                                                            <label>Tanggal Realisasi Monitoring</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" style="display:none;">
                                                            <input type="date" class="form-control" name="tanggal_realisasi_monitoring" value="<?php echo isset($edit_monitoring['tanggal_realisasi_monitoring']) ? $edit_monitoring['tanggal_realisasi_monitoring'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4 verification-input" style="display:none;">
                                                            <label>Progres Realisasi Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" style="display:none;">
                                                            <input type="text" class="form-control" name="realisasi_monitoring" placeholder="pensentase %" value="<?php echo isset($edit_monitoring['realisasi_monitoring']) ? $edit_monitoring['realisasi_monitoring'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4 verification-input" style="display:none;">
                                                            <label>Keterangan Monitoring (opsional)</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" style="display:none;">
                                                            <input type="text" class="form-control" name="keterangan_monitoring" placeholder="volume" value="<?php echo isset($edit_monitoring['keterangan_monitoring']) ? $edit_monitoring['keterangan_monitoring'] : ''; ?>">
                                                        </div>

                                                        <div class="col-md-12 form-group comment-input" style="display:none;">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                            <textarea type="text" class="form-control" name="komentar_monitoring" id="exampleFormControlTextarea1" rows="3" placeholder="Berikan komentar anda" value="<?php echo isset($edit_monitoring['komentar_monitoring']) ? $edit_monitoring['komentar_monitoring'] : ''; ?>"><?php echo $edit_monitoring['komentar_monitoring'];?></textarea>
                                                        </div>

                                                        <!-- <div class="col-md-4" >
                                                            <label for="image">Upload Gambar</label>
                                                        </div>
                                                        <div class="col-md-8 form-group" >
                                                            <input type="file" name="gambar_monitoring" id="image" accept="image/*">
                                                        </div> -->

                                                        <div class="col-md-4">
                                                            <label>Upload Gambar</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <?php if (!empty($edit_monitoring['gambar_isu'])): ?>
                                                                <p>Gambar Lama: <a href="<?= base_url('uploads/images/' . $edit_monitoring['gambar_isu']) ?>" target="_blank"><?= $edit_monitoring['gambar_isu'] ?></a></p>
                                                            <?php endif; ?>
                                                            <input type="file" class="form-control" name="gambar_isu" accept="image/*">
                                                            <small>Kosongkan jika tidak ingin mengubah gambar</small>
                                                        </div>

                                                        <!-- Tambahkan upload gambar -->
                                                        <!-- <div class="form-group">
                                                            <label for="image">Upload Gambar</label>
                                                            <input type="file" name="gambar_monitoring" id="image" accept="image/*" required>
                                                        </div> -->
                                                        
                                                        <!-- Tambahkan upload dokumen -->
                                                        <!-- <div class="form-group">
                                                            <label for="document">Upload Dokumen</label>
                                                            <input type="file" name="document_monitoring" id="document" accept=".pdf,.doc,.docx" required>
                                                        </div> -->
                                                        <!-- <div class="col-md-4 verification-input" >
                                                            <label for="document">Upload Dokumen</label>
                                                        </div>
                                                        <div class="col-md-8 form-group verification-input" >
                                                            <input type="file" name="document_monitoring" id="document" accept=".pdf,.doc,.docx" required>
                                                        </div> -->

                                                        <script>
                                                            document.getElementById('title_status_monitoring').addEventListener('change', function() {
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
                                                                if (selectedValue === 'Tidak dapat dilaksanakan') {
                                                                    commentInput.style.display = 'block';
                                                                } else {
                                                                    commentInput.style.display = 'none';
                                                                }
                                                            });
                                                        </script>

                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
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
                                                        var map = L.map('map').setView([<?php echo $edit_monitoring['latitude'];?>, <?php echo $edit_monitoring['longitude'];?>], 15);

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


                                                        var marker = L.marker([<?php echo $edit_monitoring['latitude'];?>, <?php echo $edit_monitoring['longitude'];?>]).addTo(map)
                                                            .bindPopup('<?php echo $edit_monitoring['title_isu'];?>')
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