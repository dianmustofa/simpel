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
                            <div class="col-md-6 col-12">
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
                                                            <label>Isu Lingkungan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" class="form-control"
                                                                name="title_isu" value="<?php echo isset($edit_isu['title_isu']) ? $edit_isu['title_isu'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Kategori</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_kategori" value="<?php echo isset($edit_isu['title_kategori']) ? $edit_isu['title_kategori'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Jenis</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_jenis" value="<?php echo isset($edit_isu['title_jenis']) ? $edit_isu['title_jenis'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_pekerjaan" value="<?php echo isset($edit_isu['title_pekerjaan']) ? $edit_isu['title_pekerjaan'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Detail Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="detail_pekerjaan" value="<?php echo isset($edit_isu['detail_pekerjaan']) ? $edit_isu['detail_pekerjaan'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Aset Lahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_aset_lahan" value="<?php echo isset($edit_isu['title_aset_lahan']) ? $edit_isu['title_aset_lahan'] : ''; ?>">
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <label>Kecamatan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_kecamatan" value="<?php echo isset($edit_isu['title_kecamatan']) ? $edit_isu['title_kecamatan'] : ''; ?>">
                                                        </div> -->
                                                        <div class="col-md-4">
                                                            <label>Kelurahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_kelurahan" value="<?php echo isset($edit_isu['title_kelurahan']) ? $edit_isu['title_kelurahan'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No RW</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_rw" value="<?php echo isset($edit_isu['title_rw']) ? $edit_isu['title_rw'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No RT</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="title_rt" value="<?php echo isset($edit_isu['title_rt']) ? $edit_isu['title_rt'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Latitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="latitude" value="<?php echo isset($edit_isu['latitude']) ? $edit_isu['latitude'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Longitude</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="longitude" value="<?php echo isset($edit_isu['longitude']) ? $edit_isu['longitude'] : ''; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Tanggal Upload</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="last_created_date" value="<?php echo isset($edit_isu['last_created_date']) ? $edit_isu['last_created_date'] : ''; ?>" readonly>
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <label>Dokumentasi</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control"
                                                                name="fname" value="You can't update me :P">
                                                        </div> -->

                                                        

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

                                                        <div class="col-md-12 form-group">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                            <textarea type="text" class="form-control" name="komentar_usulan" id="exampleFormControlTextarea1" rows="3"><?php echo isset($edit_isu['komentar_usulan']) ? $edit_isu['komentar_usulan'] : ''; ?></textarea>
                                                        </div>

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
                                                        var map = L.map('map').setView([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>], 15);

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


                                                        var marker = L.marker([<?php echo $edit_isu['latitude'];?>, <?php echo $edit_isu['longitude'];?>]).addTo(map)
                                                            .bindPopup('<?php echo $edit_isu['title_isu'];?>')
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