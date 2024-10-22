<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMONTER - Monitoring</title>
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
                                <h3>Monitoring Kegiatan</h3>
                                <p class="text-subtitle text-muted">Berikut histori data informasi perencanaan lingkungan.</p>
                            </div>

                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                Daftar Monitoring
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
                                            <th>Tanggal Realisasi</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($monitoring as $row) { 
                                            $idIsu = $row['id_isu'];
                                            $titleIsu = $row['title_isu'];
                                            $latitude = $row['latitude'];
                                            $longitude = $row['longitude'];
                                            $titleJenis = $row['title_jenis'];
                                            $alamatIsu = $row['alamat_isu'];
                                            $titleKelurahan = $row['title_kelurahan'];
                                            $titleRW = $row['title_rw'];
                                            $titleRT = $row['title_rt'];
                                            $statusMonitoring = $row['status_monitoring'];
                                            $tanggalrealisasiMonitoring = $row['tanggal_realisasi_monitoring'];
                                            $komentarMonitoring = $row['komentar_monitoring'];
                                        ?>
                                            <tr>
                                                <td><?= $titleIsu ?></td>
                                                <td><?= $titleJenis ?></td>
                                                <td><?= $alamatIsu ?></td>
                                                <td><?= $titleKelurahan ?></td>
                                                <td><?= $titleRW ?></td>
                                                <td><?= $titleRT ?></td>
                                                <td>
                                                <?php if ($statusMonitoring != NULL) : ?>
                                                    <?= $tanggalrealisasiMonitoring ?>
                                                    <?php else : ?>
                                                        Tanggal belum update
                                                        <?php endif; ?>
                                                </td>
                                                
                                                <td>
                                                    <!-- <span class="badge bg-info" style="cursor: pointer;">Detail</span> -->
                                                    <!-- <span class="badge bg-secondary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#xlarge">Review</span> -->
                                                    <!-- <a href="<?php echo base_url(); ?>monitoring/review/<?= $idIsu ?>">
                                                        <span class="badge bg-secondary" style="cursor: pointer;">Update Hasil Monitoring</span>
                                                    </a> -->

                                                    <?php if ($statusMonitoring === 'Dilaksanakan') : ?>
                                                        <span class="badge bg-success">Dilaksanakan</span>
                                                        <!-- <span class="badge bg-info" style="cursor: pointer;">Edit</span> -->
                                                        <a href="<?php echo base_url(); ?>monitoring/edit/<?= $idIsu ?>">
                                                            <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                        </a>
                                                        <?php elseif ($statusMonitoring === 'Tidak dapat dilaksanakan') : ?>
                                                            <span class="badge bg-warning">Tidak dapat dilaksanakan</span>
                                                            <p><?= $komentarMonitoring ?></p>
                                                    <?php else : ?>
                                                        <span class="badge bg-danger">Sedang Proses</span>
                                                        <a href="<?php echo base_url(); ?>monitoring/review/<?= $idIsu ?>">
                                                            <span class="badge bg-secondary" style="cursor: pointer;">Update Hasil Monitoring</span>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                                <span class="btn btn-success" id="exportExcel" style="cursor: pointer;">Export ke Excel</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
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
                rowData.push(rows[i].cells[3].innerText); // Kolom Status
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
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->
</body>

</html>