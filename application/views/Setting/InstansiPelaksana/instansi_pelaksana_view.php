<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMONTER - Instansi Pelaksana</title>
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
                                <h3>Daftar list Instansi Pelaksana</h3>
                                <p class="text-subtitle text-muted"></p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalScrollable">
                                                    + Tambah Instansi Pelaksana
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
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Form Instansi Pelaksana</h5>
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
                                                    <form action="<?= site_url('setting/simpan_instansipelaksana') ?>" method="post" enctype="multipart/form-data">
                                                    <!-- Tambahkan CSS untuk ukuran peta -->

                                                    <div class="form-group">
                                                        <label>Nama Instansi Pelaksana</label>
                                                        <input type="text" name="title_instansi_pelaksana" placeholder="" class="form-control" required>
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
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                Daftar Instansi Pelaksana
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                            <th>Action</th>
                                            <?php else : ?>
                                                <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($instansipelaksana as $row) { 
                                            $idInstansiPelaksana = $row['id_instansi_pelaksana'];
                                            $titleInstansiPelaksana = $row['title_instansi_pelaksana'];
                                        ?>
                                            <tr>
                                                <td><?= $titleInstansiPelaksana ?></td>
                                                <td>
                                                <?php if (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                                    <a href="<?php echo base_url(); ?>instansipelaksana/edit/<?= $idInstansiPelaksana ?>">
                                                        <span class="badge bg-secondary" style="cursor: pointer;">Edit</span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>setting/delete_instansipelaksana/<?= $idInstansiPelaksana ?>">
                                                        <span class="badge bg-danger" style="cursor: pointer;" onclick="return confirm('Anda yakin ingin menghapus item ini?');">Hapus</span>
                                                    </a>
                                                <?php else : ?>
                                                    <?php endif; ?>
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

    </script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->
</body>

</html>