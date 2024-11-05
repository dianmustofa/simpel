<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMONTER - Usulan</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/simple-datatables/style.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <!-- end css -->

    <style>

        .pagination {
            margin-top: 10px;
        }

        .pagination button {
            margin: 0 2px;
            padding: 5px 10px;
        }
    </style>

    <!-- Tambahkan library SheetJS dari CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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


                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="row" id="basic-table">
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Daftar Usulan</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <input type="text" id="searchInput" placeholder="Cari..." onkeyup="filterTable()">
                                            <button onclick="exportToExcel()">Ekspor ke Excel</button>
                                        </div>

                                        <!-- Table with no outer spacing -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0 table-lg" id="dataTable">
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
                                                                <!-- <a href="<?php echo base_url(); ?>usulan/review/<?= $idIsu ?>"> -->
                                                                    <!-- <span class="badge bg-secondary" style="cursor: pointer;">Lanjutkan Usulan</span> -->
                                                                <!-- </a> -->

                                                                <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                                                    <?php if ($titleOPD != Null) : ?>
                                                                        <span class="badge bg-success">Diteruskan ke <?= $titleOPD ?></span>
                                                                        
                                                                        <?php if ($statusUsulan != Null) : ?>
                                                                            <span class="badge bg-success">Status <?= $statusUsulan ?></span>
                                                                            <a href="<?php echo base_url(); ?>usulan/edit/<?= $idIsu ?>">
                                                                                <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                                            </a>
                                                                        <?php else : ?>
                                                                            <span class="badge bg-info">Status masih di SKPD</span>
                                                                            <a href="<?php echo base_url(); ?>usulan/edit/<?= $idIsu ?>">
                                                                                <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <!-- <span class="badge bg-info" style="cursor: pointer;">Edit</span> -->
                                                                    <?php else : ?>
                                                                        <!-- <span class="badge bg-danger" style="cursor: pointer;">Lengkapi Usulan</span> -->
                                                                        <a href="<?php echo base_url(); ?>usulan/review/<?= $idIsu ?>">
                                                                            <span class="badge bg-danger" style="cursor: pointer;">Review Usulan</span>
                                                                        </a>
                                                                    <?php endif; ?>

                                                                    <?php elseif ($this->session->userdata('id_level_akun') === '3') : ?>
                                                                        <?php if ($statusUsulan != Null) : ?>
                                                                            <span class="badge bg-success">Status <?= $statusUsulan ?></span>
                                                                            <a href="<?php echo base_url(); ?>usulan/edit/<?= $idIsu ?>">
                                                                                <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                                            </a>
                                                                            <!-- <span class="badge bg-info" style="cursor: pointer;">Edit</span> -->
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

                                            <div class="card-body">
                                                <div class="pagination" id="paginationControls"></div>
                                            </div>

                                            <script>
                                                const rowsPerPage = 10;
                                                let currentPage = 1;
                                                let filteredRows = [];

                                                function filterTable() {
                                                    const input = document.getElementById("searchInput").value.toUpperCase();
                                                    const table = document.getElementById("dataTable");
                                                    const rows = table.getElementsByTagName("tr");
                                                    const noDataMessage = document.getElementById("noDataMessage");
                                                    filteredRows = [];

                                                    // Filter rows based on search input and save the result
                                                    for (let i = 1; i < rows.length; i++) {
                                                        const cells = rows[i].getElementsByTagName("td");
                                                        let match = false;
                                                        for (let j = 0; j < cells.length; j++) {
                                                            if (cells[j].innerHTML.toUpperCase().indexOf(input) > -1) {
                                                                match = true;
                                                                break;
                                                            }
                                                        }
                                                        rows[i].style.display = match ? "" : "none";
                                                        if (match) filteredRows.push(rows[i]);
                                                    }

                                                    // Tampilkan atau sembunyikan pesan "Tidak ada data ditemukan"
                                                    if (filteredRows.length === 0) {
                                                        noDataMessage.style.display = "block";
                                                    } else {
                                                        noDataMessage.style.display = "none";
                                                    }

                                                    paginate(filteredRows.length);
                                                }

                                                function paginate(totalRows) {
                                                    const totalPages = Math.ceil(totalRows / rowsPerPage);
                                                    const paginationControls = document.getElementById("paginationControls");

                                                    paginationControls.innerHTML = "";
                                                    for (let i = 1; i <= totalPages; i++) {
                                                        const btn = document.createElement("button");
                                                        btn.innerHTML = i;
                                                        btn.onclick = function () { changePage(i); };
                                                        paginationControls.appendChild(btn);
                                                    }

                                                    changePage(1);
                                                }

                                                function changePage(page) {
                                                    const table = document.getElementById("dataTable");
                                                    const rows = filteredRows.length ? filteredRows : Array.from(table.getElementsByTagName("tr")).slice(1);

                                                    currentPage = page;
                                                    const start = (currentPage - 1) * rowsPerPage;
                                                    const end = start + rowsPerPage;

                                                    for (let i = 1; i < table.getElementsByTagName("tr").length; i++) {
                                                        table.getElementsByTagName("tr")[i].style.display = "none";
                                                    }

                                                    for (let i = start; i < end && i < rows.length; i++) {
                                                        rows[i].style.display = "";
                                                    }
                                                }

                                                function exportToExcel() {
                                                    const table = document.getElementById("dataTable");
                                                    const workbook = XLSX.utils.book_new();
                                                    const worksheetData = [];

                                                    // Mendapatkan data header tabel
                                                    const headerCells = table.querySelectorAll("thead th");
                                                    const header = Array.from(headerCells).map(cell => cell.innerText);
                                                    worksheetData.push(header);

                                                    // Mendapatkan data baris tabel
                                                    const rows = table.querySelectorAll("tbody tr");
                                                    rows.forEach(row => {
                                                        const rowData = Array.from(row.querySelectorAll("td")).map(cell => cell.innerText);
                                                        worksheetData.push(rowData);
                                                    });

                                                    // Menambahkan worksheet ke dalam workbook dan mengekspor ke Excel
                                                    const worksheet = XLSX.utils.aoa_to_sheet(worksheetData);
                                                    XLSX.utils.book_append_sheet(workbook, worksheet, "DataTabel");
                                                    XLSX.writeFile(workbook, "tabel_usulan.xlsx");
                                                }

                                                window.onload = function () {
                                                    const rows = document.getElementById("dataTable").getElementsByTagName("tr").length - 1;
                                                    filteredRows = Array.from(document.getElementById("dataTable").getElementsByTagName("tr")).slice(1);
                                                    paginate(rows);
                                                }
                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Basic Tables end --> 

                </div>

            </div>

        </div>
    </div>
    <!-- js -->
    
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/vendors/simple-datatables/simple-datatables.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    
    <!-- end js -->
</body>

</html>