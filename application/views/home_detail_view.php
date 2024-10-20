<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>SIMONTER - Home Detail</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <!-- end css -->
    
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

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <!-- <h3><?php echo $review_isu['title_isu'];?></h3> -->
                                <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Home detail
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo $review_isu['title_isu'];?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo $review_isu['title_jenis'];?>
                            </div>
                        </div>
                    </section>

                    <!-- Progress Label Start  -->
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4>Progress</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                </p>
                                <div class="progress progress-primary  mb-4">

                                <?php
                                    // Ambil status dari variabel PHP yang dikirim dari controller
                                    $status_isu = isset($status_isu) ? $status_isu : 'Belum Ada Status'; // Status default jika kosong
                                    $status_usulan = isset($status_usulan) ? $status_usulan : 'Belum Ada Status'; // Status default jika kosong
                                ?>

                                <div id="progressBar" class="progress-bar progress-label" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>

                                <script>
                                    // Ambil status dari PHP
                                    var statusIsu = "<?php echo $status_isu; ?>";
                                    var statusUsulan = "<?php echo $status_usulan; ?>";

                                    function updateProgressBar(statusIsu, statusUsulan) {
                                        var progressBar = document.getElementById('progressBar');
                                        var progress = 0;
                                        
                                        // Logika status isu
                                        if (statusIsu === 'Dilanjutkan') {
                                            progress = 40; // Progress 40% untuk status isu 'Dilanjutkan'
                                        }

                                        // Logika status usulan
                                        if (statusUsulan === 'Dilaksanakan' || statusUsulan === 'Dilaksanakan Bersyarat') {
                                            progress = 90; // Progress 90% untuk status usulan 'Dilaksanakan' atau 'Dilaksanakan Bersyarat'
                                        }

                                        // Update progress bar
                                        progressBar.style.width = progress + '%';
                                        progressBar.setAttribute('aria-valuenow', progress);
                                    }

                                    // Panggil fungsi untuk memperbarui progress bar
                                    updateProgressBar(statusIsu, statusUsulan); // Kirim status isu dan usulan
                                </script>


                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Progress Label End  -->

                    <!-- Basic Horizontal form layout section start -->
                    <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Detail Isu Lingkungan</h4>
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
                                                                name="fname" value="<?php echo $review_isu['detail_pekerjaan'];?>">
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
                                                                name="fname" value="<?php echo $review_isu['title_kecamatan'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Kelurahan</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_kelurahan'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No RW</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_rw'];?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No RT</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                name="fname" value="<?php echo $review_isu['title_rt'];?>">
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
                                                            <label>Instansi Pelaksana</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <?php if ( $review_isu['title_opd'] != Null) : ?>
                                                                <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                    name="fname" value="<?php echo $review_isu['title_opd'];?>">
                                                            <?php else : ?>
                                                                <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                    name="fname" value="Sedang di Proses">
                                                                <?php endif; ?>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Indikasi Tahun Pelaksana</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <?php if ( $review_isu['indikasi_tahun_pelaksana_usulan'] != Null) : ?>
                                                                    <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                        name="fname" value="<?php echo $review_isu['indikasi_tahun_pelaksana_usulan'];?>">
                                                                <?php else : ?>
                                                                    <input type="text" id="readonlyInput" readonly="readonly" class="form-control"
                                                                        name="fname" value="Sedang di Proses">
                                                                    <?php endif; ?>
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


                                                        var marker = L.marker([<?php echo $review_isu['latitude'];?>, <?php echo $review_isu['longitude'];?>]).addTo(map)
                                                            .bindPopup('<?php echo $review_isu['title_isu'];?>')
                                                            .openPopup();


                                                    </script>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Dokumentasi</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <img src="<?php echo base_url();?>uploads/images/<?php echo $review_isu['gambar_isu'];?>" alt="" width="100%">
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

    <!-- js -->
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->

</body>

</html>