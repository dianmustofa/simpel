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

                            </div>
                        </div>
                    </div>

                    <!-- <section class="section">
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
                    </section> -->

                    <!-- Tambahkan CSS untuk ukuran peta -->
                    <!-- <style>
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

                    </script> -->


                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                Daftar Usulan
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Isu Lingkungan</th>
                                            <th>Program</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>RW</th>
                                            <th>RT</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($usulan as $row) { 
                                            $idIsu = $row['id_isu'];
                                            $titleIsu = $row['title_isu'];
                                            $latitude = $row['latitude'];
                                            $longitude = $row['longitude'];
                                            $titleJenis = $row['title_jenis'];
                                            $alamatIsu = $row['alamat_isu'];
                                            $titleKelurahan = $row['title_kelurahan'];
                                            $titleRW = $row['title_rw'];
                                            $titleRT = $row['title_rt'];
                                            $titleOPD = $row['title_opd'];
                                            $statusUsulan = $row['status_usulan'];
                                        ?>
                                            <tr>
                                                <td><?= $titleIsu ?></td>
                                                <td><?= $titleJenis ?></td>
                                                <td><?= $alamatIsu ?></td>
                                                <td><?= $titleKelurahan ?></td>
                                                <td><?= $titleRW ?></td>
                                                <td><?= $titleRT ?></td>
                                                <td>
                                                    <!-- <span class="badge bg-primary zoom-to" data-lat="<?= $latitude ?>" data-lng="<?= $longitude ?>" data-title="<?= $titleIsu ?>" style="cursor: pointer;">Zoom to</span> -->
                                                    <!-- <span class="badge bg-secondary" style="cursor: pointer;">Review</span> -->
                                                    <a href="<?php echo base_url(); ?>usulan/review/<?= $idIsu ?>">
                                                        <!-- <span class="badge bg-secondary" style="cursor: pointer;">Lanjutkan Usulan</span> -->
                                                    </a>

                                                    <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                                        <?php if ($titleOPD != Null) : ?>
                                                            <span class="badge bg-success">Diteruskan ke <?= $titleOPD ?></span>
                                                            <span class="badge bg-info" style="cursor: pointer;">Edit</span>
                                                        <?php else : ?>
                                                            <!-- <span class="badge bg-danger" style="cursor: pointer;">Lengkapi Usulan</span> -->
                                                            <a href="<?php echo base_url(); ?>usulan/review/<?= $idIsu ?>">
                                                                <span class="badge bg-danger" style="cursor: pointer;">Review Usulan</span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php elseif ($this->session->userdata('id_level_akun') === '3') : ?>
                                                            <?php if ($statusUsulan != Null) : ?>
                                                                <span class="badge bg-success">Status <?= $statusUsulan ?></span>
                                                                <span class="badge bg-info" style="cursor: pointer;">Edit</span>
                                                            <?php else : ?>
                                                                <!-- <span class="badge bg-danger" style="cursor: pointer;">Lengkapi Usulan</span> -->
                                                                <a href="<?php echo base_url(); ?>usulan/review/<?= $idIsu ?>">
                                                                    <span class="badge bg-danger" style="cursor: pointer;">Review Usulan</span>
                                                                </a>
                                                            <?php endif; ?>

                                                            <?php else : ?>

                                                                <p>Tidak memiliki akses</p>

                                                                <?php endif; ?>

                                                    
                                                </td>
                                            </tr>

                                        <?php } ?>

                                        <!-- <script>
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
                                        </script> -->

                                    </tbody>
                                </table>

                                <span class="btn btn-success" id="exportExcel" style="cursor: pointer;">Export ke Excel</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

    <script>
        let dataTable = new simpleDatatables.DataTable('#table1');
        // Fungsi untuk memilih kolom tertentu dari tabel
        function getSelectedColumns() {
            const table = document.getElementById('table1');
            const rows = table.rows;
            let selectedData = [];

            // Loop melalui setiap baris tabel
            for (let i = 0; i < rows.length; i++) {
                let rowData = [];
                // Pilih kolom tertentu
                rowData.push(rows[i].cells[0].innerText); // Kolom Title Isu
                rowData.push(rows[i].cells[1].innerText); // Kolom Latitude
                rowData.push(rows[i].cells[2].innerText); // Kolom Longitude
                selectedData.push(rowData);
            }

            return selectedData;
        }

        // Fungsi untuk ekspor data ke Excel
        document.getElementById('exportExcel').addEventListener('click', function() {
            const selectedData = getSelectedColumns();

            // Membuat workbook baru
            let ws = XLSX.utils.aoa_to_sheet(selectedData);
            let wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Data Terpilih");

            // Simpan file Excel
            XLSX.writeFile(wb, "selected_columns.xlsx");
        });
    </script>
    
    <!-- end js -->
</body>

</html>