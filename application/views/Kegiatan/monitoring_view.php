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
                                <h3>Monitoring Perencanaan</h3>
                                <p class="text-subtitle text-muted">Berikut histori data informasi perencanaan lingkungan.</p>
                            </div>

                        </div>
                    </div>
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($monitoring as $row) { 
                                            $titleIsu = $row['title_isu'];
                                            $latitude = $row['latitude'];
                                            $longitude = $row['longitude'];
                                        ?>
                                            <tr>
                                                <td><?= $titleIsu ?></td>
                                                <td><?= $latitude ?></td>
                                                <td><?= $longitude ?></td>
                                                <td></td>
                                                <td>
                                                    <span class="badge bg-info" style="cursor: pointer;">Detail</span>
                                                    <span class="badge bg-secondary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#xlarge">Review</span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>

                    <!-- Review Modal -->
                    <div class="modal fade text-left w-100" id="xlarge" tabindex="-1"
                        role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel16">Detail Informasi Perencanaan</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <style>
                                        #map1 {
                                            height: 300px; /* Atur tinggi peta */
                                            /* width: auto; */
                                        }
                                    </style>
                                    
                                    <div id="map1"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
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