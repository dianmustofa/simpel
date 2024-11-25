<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMONTER - Monitoring</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
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
                                <h3>Monitoring Kegiatan</h3>
                                <p class="text-subtitle text-muted">Berikut histori data informasi perencanaan lingkungan.</p>
                            </div>

                        </div>
                    </div>

                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="row" id="basic-table">
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Daftar Monitoring</h4>
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
                                                    <th>Manfaat dan Tujuan</th>
                                                    <th>Indikasi Program</th>
                                                    <th>Program</th>
                                                    <th>Alamat</th>
                                                    <th>Kelurahan</th>
                                                    <th>RW</th>
                                                    <th>RT</th>
                                                    <th>Indikasi Tahun Pelaksana</th>
                                                    <th>Sumber Pendanaan</th>
                                                    <th>Instansi Pelaksana</th>
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
                                                    $manfaatTujuanUsulan = $row['manfaat_tujuan_usulan'];
                                                    $indikasiProgramUsulan = $row['indikasi_program_usulan'];
                                                    $sumberPendanaanUsulan = $row['sumber_pendanaan_usulan'];
                                                    $indikasiTahunPelaksanaUsulan = $row['indikasi_tahun_pelaksana_usulan'];
                                                    $titleOPD = $row['title_opd'];
                                                ?>
                                                    <tr>
                                                        <td><?= $manfaatTujuanUsulan ?></td>
                                                        <td><?= $indikasiProgramUsulan ?></td>
                                                        <td><?= $titleJenis ?></td>
                                                        <td><?= $alamatIsu ?></td>
                                                        <td><?= $titleKelurahan ?></td>
                                                        <td><?= $titleRW ?></td>
                                                        <td><?= $titleRT ?></td>
                                                        <td><?= $indikasiTahunPelaksanaUsulan ?></td>
                                                        <td><?= $sumberPendanaanUsulan ?></td>
                                                        <td><?= $titleOPD ?></td>
                                                        <td>
                                                        <?php if ($statusMonitoring != NULL) : ?>
                                                            <?= $tanggalrealisasiMonitoring ?>
                                                            <?php else : ?>
                                                                Tanggal belum update
                                                                <?php endif; ?>
                                                        </td>
                                                        
                                                        <td>

                                                            <?php if ($statusMonitoring === 'Dilaksanakan') : ?>
                                                                <span class="badge bg-success">Dilaksanakan</span>
                                                                <!-- <span class="badge bg-info" style="cursor: pointer;">Edit</span> -->
                                                                <a href="<?php echo base_url(); ?>monitoring/edit/<?= $idIsu ?>">
                                                                    <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                                </a>
                                                                <a href="<?php echo base_url(); ?>monitoring/detail/<?= $idIsu ?>">
                                                                    <span class="badge bg-secondary" style="cursor: pointer;">detail</span>
                                                                </a>
                                                                <?php elseif ($statusMonitoring === 'Tidak dapat dilaksanakan') : ?>
                                                                    <span class="badge bg-warning">Tidak dapat dilaksanakan</span>
                                                                    <a href="<?php echo base_url(); ?>monitoring/edit/<?= $idIsu ?>">
                                                                        <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                                    </a>
                                                                    <a href="<?php echo base_url(); ?>monitoring/detail/<?= $idIsu ?>">
                                                                        <span class="badge bg-secondary" style="cursor: pointer;">detail</span>
                                                                    </a>
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
                                                    XLSX.writeFile(workbook, "tabel_monitoring.xlsx");
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
    <!-- <script src="<?php echo base_url();?>assets/vendors/simple-datatables/simple-datatables.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->
</body>

</html>