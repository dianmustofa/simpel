<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMONTER - Laporan Tahunan</title>
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
                                <h3>Dokumen Pendukung CAP</h3>
                                <p class="text-subtitle text-muted"></p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalScrollable">
                                                    + Upload dokumen pendukung CAP
                                                </button>
                                            </li>
                                        </ol>
                                    </nav>
                                <?php else : ?>
                                    <?php endif; ?>
                                <!-- Form Perencanaan Modal -->
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Form Laporan Tahunan</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <?php if($this->session->flashdata('upload_errors')): ?>
                                                <div class="alert alert-danger">
                                                    <strong>Error:</strong> <?= $this->session->flashdata('upload_errors'); ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                                <div class="modal-body">
                                                    <form action="<?= site_url('laporan/simpan') ?>" method="post" enctype="multipart/form-data">
                                                    <!-- Tambahkan CSS untuk ukuran peta -->

                                                    <div class="form-group">
                                                        <label>Judul Dokumen</label>
                                                        <input type="text" name="title_laporan" placeholder="" class="form-control" required>
                                                    </div>

                                                    <!-- Input Kelurahan -->
                                                    <?php 
                                                        $jenis="";
                                                    if(isset($default['title_kelurahan'])) $jenis=$default['title_kelurahan'];
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <!-- <input type="text" name="title_isu" placeholder="Isu Perencanaan" class="form-control" required> -->
                                                        <select class="choices form-select" name="kelurahan_laporan" required>
                                                            <!-- Opsi default yang tidak bisa dipilih -->
                                                            <option value="" disabled selected>Pilih Kelurahan</option>
                                                            <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                            <?php if (!empty($level_kelurahan)): ?>
                                                                <?php foreach ($level_kelurahan as $row): ?>
                                                                    <option value="<?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>">
                                                                        <?= htmlspecialchars($row['title_kelurahan'], ENT_QUOTES, 'UTF-8') ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">Kelurahan tidak tersedia</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tahun CAP</label>
                                                        <input type="text" name="tahun_laporan" placeholder="" class="form-control" required>
                                                    </div>

                                                    <!-- Tambahkan upload dokumen -->
                                                    <div class="form-group">
                                                        <label for="document">Upload Dokumen</label>
                                                        <input type="file" name="document_laporan" id="document" accept=".pdf,.doc,.docx" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                                    
                                                </div>

                                                </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="row" id="basic-table">
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">List Dokumen</h4>
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
                                                        <th>Judul Dokumen</th>
                                                        <th>Lokasi CAP</th>
                                                        <th>Tahun CAP</th>
                                                        <th>Dokumen</th>
                                                        <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                                        <th>Action</th>
                                                        <?php else : ?>
                                                            <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($laporan as $row) { 
                                                        $idLaporan = $row['id_laporan'];
                                                        $kelLaporan = $row['kelurahan_laporan'];
                                                        $titleLaporan = $row['title_laporan'];
                                                        $tahunLaporan = $row['tahun_laporan'];
                                                        $dokumentLaporan = $row['document_laporan'];
                                                    ?>
                                                        <tr>
                                                            <td><?= $titleLaporan ?></td>
                                                            <td><?= $kelLaporan ?></td>
                                                            <td><?= $tahunLaporan ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>uploads/documents/<?= $dokumentLaporan ?>" target="blank">
                                                                    <span class="badge bg-info" style="cursor: pointer;">lihat dokumen</span>
                                                                </a>
                                                            </td>
                                                            <td>
                                                            <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                                                <a href="<?php echo base_url(); ?>laporan/edit/<?= $idLaporan ?>">
                                                                    <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                                </a>
                                                                <a href="<?php echo base_url(); ?>laporan/delete/<?= $idLaporan ?>">
                                                                    <span class="badge bg-danger" style="cursor: pointer;" onclick="return confirm('Anda yakin ingin menghapus item ini?');">Hapus</span>
                                                                </a>
                                                            <?php else : ?>
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
                                                    XLSX.writeFile(workbook, "tabel_dokumen_cap.xlsx");
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