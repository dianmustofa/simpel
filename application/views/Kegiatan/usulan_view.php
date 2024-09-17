<!DOCTYPE html>
<html lang="en">

<head>
    <title>DataTable - Mazer Admin Dashboard</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <!-- end css -->
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

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Usulan Perencanaan</h3>
                                <p class="text-subtitle text-muted">Berikut histori data informasi perencanaan lingkungan.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#xlarge">
                                                + Ajukan Permohonan
                                            </button>
                                        </li>
                                    </ol>
                                </nav>
                                <!--Extra Large Modal -->
                                <div class="modal fade text-left w-100" id="xlarge" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel16">Form Ajuan Perencanaan</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="<?= site_url('isu/simpan') ?>" method="post">
                                                <div class="modal-body">
                                                    <!-- Tambahkan CSS untuk ukuran peta -->
                                                    <style>
                                                        #map1 {
                                                            height: 300px; /* Atur tinggi peta */
                                                            /* width: auto; */
                                                        }
                                                    </style>
                                                    
                                                    <div id="map1"></div>
                                                    
                                                    <label for="latitude">Latitude : <span id="latitudeValue">-6.233246</span></label>
                                                    <input type="hidden" name="latitude" id="latitudeInput" value="51.505"><br>
                                                    <label for="longitude">Longitude : <span id="longitudeValue">106.837806</span></label>
                                                    <input type="hidden" name="longitude" id="longitudeInput" value="-0.09"><br>
                                                    <hr>
                                                    
                                                    <label>Isu</label>
                                                    <div class="form-group">
                                                        <input type="text" name="title_isu" placeholder="Isu Perencanaan" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Accept</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>

                                            <script>
                                                var map1 = L.map('map1').setView([-6.233246, 106.837806], 13);

                                                // Menambahkan tile layer peta
                                                // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                // }).addTo(map1);
                                                L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                                                        maxZoom: 20,
                                                        subdomains:['mt0','mt1','mt2','mt3']
                                                }).addTo(map1);

                                                // Tambahkan marker awal
                                                var marker = L.marker([-6.233246, 106.837806]).addTo(map1);

                                                // Event listener untuk menangkap klik pada peta
                                                map1.on('click', function(e) {
                                                    var lat = e.latlng.lat;
                                                    var lng = e.latlng.lng;

                                                    // Perbarui posisi marker
                                                    marker.setLatLng([lat, lng]).update();

                                                    // Perbarui popup dengan koordinat baru
                                                    marker.bindPopup(lat + ', ' + lng).openPopup();

                                                    // Perbarui nilai latitude dan longitude pada label
                                                    document.getElementById('latitudeValue').innerText = lat.toFixed(5);
                                                    document.getElementById('longitudeValue').innerText = lng.toFixed(5);

                                                    document.getElementById('latitudeInput').value = lat.toFixed(5);
                                                    document.getElementById('longitudeInput').value = lng.toFixed(5);
                                                });

                                                // Re-initialize map when modal is shown
                                                document.addEventListener('shown.bs.modal', function () {
                                                    map1.invalidateSize(); // Pastikan peta ditampilkan dengan benar setelah modal dibuka
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Peta Lokasi Perencanaan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Tambahkan CSS untuk ukuran peta -->
                    <style>
                        #map {
                            height: 400px; /* Atur tinggi peta */
                        }
                    </style>

                    <script>
                        var map = L.map('map').setView([-6.233246, 106.837806], 13);

                        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        // }).addTo(map);
                        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                                maxZoom: 20,
                                subdomains:['mt0','mt1','mt2','mt3']
                        }).addTo(map);

                        <?php foreach ($usulan as $index => $row) { 
                            $titleIsu = $row['title_isu'];
                            $latitude = $row['latitude'];
                            $longitude = $row['longitude'];
                        ?>

                        var marker<?= $index ?> = L.marker([<?= $latitude ?>, <?= $longitude ?>]).addTo(map)
                            .bindPopup('<?= $titleIsu ?>')
                            .openPopup();

                        <?php } ?>

                    </script>


                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                Simple Datatable
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Isu</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($usulan as $row) { 
                                            $titleIsu = $row['title_isu'];
                                            $latitude = $row['latitude'];
                                            $longitude = $row['longitude'];
                                        ?>
                                            <tr>
                                                <td><?= $titleIsu ?></td>
                                                <td><?= $latitude ?></td>
                                                <td><?= $longitude ?></td>
                                                <td>
                                                    <span class="badge bg-primary zoom-to" data-lat="<?= $latitude ?>" data-lng="<?= $longitude ?>" data-title="<?= $titleIsu ?>" style="cursor: pointer;">Zoom to</span>
                                                    <span class="badge bg-secondary" style="cursor: pointer;">Review</span>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {

                                                // Fungsi untuk zoom ke koordinat
                                                function zoomTo(lat, lng, titleIsu) {
                                                    map.setView([lat, lng], 17); // Zoom level 15 sebagai contoh
                                                    var marker = L.marker([lat, lng]).addTo(map);
                                                    marker.bindPopup(titleIsu).openPopup();
                                                }

                                                // Event listener untuk klik pada tombol 'Zoom to'
                                                document.querySelectorAll('.zoom-to').forEach(function(element) {
                                                    element.addEventListener('click', function() {
                                                        var lat = this.getAttribute('data-lat');
                                                        var lng = this.getAttribute('data-lng');
                                                        var titleIsu = this.getAttribute('data-title');
                                                        zoomTo(lat, lng, titleIsu);
                                                    });
                                                });
                                            });
                                        </script>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>

                    

                </div>

            </div>

        </div>
    </div>
    <!-- js -->
    
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->
</body>

</html>