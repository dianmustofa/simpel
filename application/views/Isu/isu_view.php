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
                                <h3>Isu Perencanaan</h3>
                                <p class="text-subtitle text-muted">Berikut histori data informasi perencanaan lingkungan.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable">
                                                + Ajukan Permohonan
                                            </button>
                                        </li>
                                    </ol>
                                </nav>
                                <!-- Form Perencanaan Modal -->
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Form Ajuan Perencanaan</h5>
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
                                                    <form action="<?= site_url('isu/simpan') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                                    <!-- Tambahkan CSS untuk ukuran peta -->
                                                    <style>
                                                        #map1 {
                                                            height: 300px; /* Atur tinggi peta */
                                                            /* width: auto; */
                                                        }
                                                    </style>
                                                    
                                                    <div id="map1"></div>
                                                    
                                                    <label for="latitude">Latitude : <span id="latitudeValue"></span></label>
                                                    <input type="hidden" name="latitude" id="latitudeInput" required><br>
                                                    <label for="longitude">Longitude : <span id="longitudeValue"></span></label>
                                                    <input type="hidden" name="longitude" id="longitudeInput" required><br>
                                                    <hr>

                                                    <?php 
                                                        $jenis = "";
                                                        if(isset($default['title_isu'])) $jenis = $default['title_isu'];
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Isu Lingkungan</label>
                                                        <select class="choices form-select" name="title_isu" required>
                                                            <!-- Opsi default yang tidak bisa dipilih -->
                                                            <option value="" disabled selected>Pilih Isu Lingkungan</option>
                                                            <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                            <?php if (!empty($level_isu)): ?>
                                                                <?php foreach ($level_isu as $row): ?>
                                                                    <option value="<?= htmlspecialchars($row['title_isu'], ENT_QUOTES, 'UTF-8') ?>">
                                                                        <?= htmlspecialchars($row['title_isu'], ENT_QUOTES, 'UTF-8') ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">Isu tidak tersedia</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <!-- Input Kategori -->
                                                    <?php 
                                                        $jenis="";
                                                    if(isset($default['title_kategori'])) $jenis=$default['title_kategori'];
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <!-- <input type="text" name="title_isu" placeholder="Isu Perencanaan" class="form-control" required> -->
                                                        <select class="choices form-select" name="title_kategori" id="title_kategori" required>
                                                            <!-- Opsi default yang tidak bisa dipilih -->
                                                            <option value="" disabled selected>Pilih Kategori</option>
                                                            <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                            <?php if (!empty($level_kategori)): ?>
                                                                <?php foreach ($level_kategori as $row): ?>
                                                                    <option value="<?= htmlspecialchars($row['title_kategori'], ENT_QUOTES, 'UTF-8') ?>">
                                                                        <?= htmlspecialchars($row['title_kategori'], ENT_QUOTES, 'UTF-8') ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">Isu tidak tersedia</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <script>
                                                        document.getElementById('title_kategori').addEventListener('change', function() {
                                                            var selectedValue = this.value;
                                                            var volumeInput = document.getElementById('volume_pekerjaan');
                                                            var jumlahPekerjaInput = document.getElementById('jumlah_pekerja');

                                                            // Menyembunyikan kedua input terlebih dahulu
                                                            volumeInput.style.display = 'none';
                                                            jumlahPekerjaInput.style.display = 'none';

                                                            // Menampilkan input sesuai dengan pilihan
                                                            if (selectedValue === 'Fisik') {
                                                                volumeInput.style.display = 'block';
                                                            } else if (selectedValue === 'Non Fisik') {
                                                                jumlahPekerjaInput.style.display = 'block';
                                                            }
                                                        });
                                                    </script>

                                                    <div class="form-group" id="volume_pekerjaan" style="display:none;">
                                                        <label>Volume Pekerjaan</label>
                                                        <input type="text" name="volume_pekerjaan" placeholder="" class="form-control" required>
                                                    </div>

                                                    <div class="form-group" id="jumlah_pekerja" style="display:none;">
                                                        <label>Jumlah Pekerja</label>
                                                        <input type="text" name="jumlah_pekerja" placeholder="" class="form-control" required>
                                                    </div>

                                                    <!-- Input Jenis -->
                                                    <?php 
                                                        $jenis="";
                                                    if(isset($default['title_jenis'])) $jenis=$default['title_jenis'];
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Jenis</label>
                                                        <!-- <input type="text" name="title_isu" placeholder="Isu Perencanaan" class="form-control" required> -->
                                                        <select class="choices form-select" name="title_jenis" required>
                                                            <!-- Opsi default yang tidak bisa dipilih -->
                                                            <option value="" disabled selected>Pilih Jenis</option>
                                                            <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                            <?php if (!empty($level_jenis)): ?>
                                                                <?php foreach ($level_jenis as $row): ?>
                                                                    <option value="<?= htmlspecialchars($row['title_jenis'], ENT_QUOTES, 'UTF-8') ?>">
                                                                        <?= htmlspecialchars($row['title_jenis'], ENT_QUOTES, 'UTF-8') ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">Isu tidak tersedia</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Lokasi</label>
                                                        <input type="text" name="title_isu" placeholder="" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <input type="text" name="title_isu" placeholder="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>RW</label>
                                                        <input type="text" name="title_isu" placeholder="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>RT</label>
                                                        <input type="text" name="title_isu" placeholder="" class="form-control" required>
                                                    </div>


                                                    <!-- Input Pekerjaan -->
                                                    <?php 
                                                        $jenis="";
                                                    if(isset($default['title_pekerjaan'])) $jenis=$default['title_pekerjaan'];
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Pekerjaan</label>
                                                        <!-- <input type="text" name="title_isu" placeholder="Isu Perencanaan" class="form-control" required> -->
                                                        <select class="choices form-select" name="title_pekerjaan" required>
                                                            <!-- Opsi default yang tidak bisa dipilih -->
                                                            <option value="" disabled selected>Pilih Pekerjaan</option>
                                                            <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                            <?php if (!empty($level_pekerjaan)): ?>
                                                                <?php foreach ($level_pekerjaan as $row): ?>
                                                                    <option value="<?= htmlspecialchars($row['title_pekerjaan'], ENT_QUOTES, 'UTF-8') ?>">
                                                                        <?= htmlspecialchars($row['title_pekerjaan'], ENT_QUOTES, 'UTF-8') ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">Isu tidak tersedia</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <!-- Input Aset Lahan -->
                                                    <?php 
                                                        $jenis="";
                                                    if(isset($default['title_aset_lahan'])) $jenis=$default['title_aset_lahan'];
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Aset Lahan</label>
                                                        <!-- <input type="text" name="title_isu" placeholder="Isu Perencanaan" class="form-control" required> -->
                                                        <select class="choices form-select" name="title_aset_lahan" required>
                                                            <!-- Opsi default yang tidak bisa dipilih -->
                                                            <option value="" disabled selected>Pilih Aset Lahan</option>
                                                            <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                            <?php if (!empty($level_aset_lahan)): ?>
                                                                <?php foreach ($level_aset_lahan as $row): ?>
                                                                    <option value="<?= htmlspecialchars($row['title_aset_lahan'], ENT_QUOTES, 'UTF-8') ?>">
                                                                        <?= htmlspecialchars($row['title_aset_lahan'], ENT_QUOTES, 'UTF-8') ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">Isu tidak tersedia</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <!-- Upload multiple files -->
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Upload Dokumen</label>
                                                        <span>(Maksimum Ukuran File : 50mb)</span>
                                                        <input class="form-control" type="file" id="formFileMultiple" name="formFileMultiple[]" multiple required>
                                                    </div>

                                                    <!-- Upload Foto -->
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Upload Foto atau Gunakan Kamera</label>
                                                        <span>(Maksimum Ukuran File: 50MB)</span>
                                                        <input class="form-control" type="file" id="formFileMultiple" name="formFileMultiple[]" accept="image/*" capture="camera" multiple required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                                    </form>
                                                </div>
                                            

                                            <script>
                                                var map1 = L.map('map1').setView([-6.233246, 106.837806], 13);

                                                // Menambahkan tile layer peta
                                                // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                // }).addTo(map1);
                                                // L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                                                //         maxZoom: 20,
                                                //         subdomains:['mt0','mt1','mt2','mt3']
                                                // }).addTo(map1);

                                                L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                                                    maxZoom: 20,
                                                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                                                }).addTo(map1);

                                                // Menambahkan widget pencarian lokasi
                                                L.Control.geocoder({
                                                    defaultMarkGeocode: false
                                                }).on('markgeocode', function(e) {
                                                    var latlng = e.geocode.center;
                                                    L.marker(latlng).addTo(map1)
                                                        .bindPopup(e.geocode.name)
                                                        .openPopup();
                                                    map1.setView(latlng, 16); // Zoom in ketika lokasi ditemukan
                                                }).addTo(map1);

                                                // Tambahkan marker awal
                                                // var marker = L.marker([-6.233246, 106.837806]).addTo(map1);
                                                var marker = null;

                                                // Event listener untuk menangkap klik pada peta
                                                map1.on('click', function(e) {
                                                    var lat = e.latlng.lat;
                                                    var lng = e.latlng.lng;

                                                    // Perbarui posisi marker
                                                    // marker.setLatLng([lat, lng]).update();

                                                    // Perbarui popup dengan koordinat baru
                                                    // marker.bindPopup(lat + ', ' + lng).openPopup();

                                                    document.getElementById('latitudeInput').value = lat.toFixed(5);
                                                    document.getElementById('longitudeInput').value = lng.toFixed(5);

                                                    // Perbarui nilai latitude dan longitude pada label
                                                    document.getElementById('latitudeValue').innerText = lat.toFixed(5);
                                                    document.getElementById('longitudeValue').innerText = lng.toFixed(5);

                                                    // Jika marker sudah ada, hapus marker sebelumnya
                                                    if (marker) {
                                                        map1.removeLayer(marker);
                                                    }

                                                    // Tambahkan marker baru pada posisi yang diklik
                                                    marker = L.marker([lat, lng]).addTo(map1);

                                                    // Validasi form untuk memastikan peta telah diklik
                                                    function validateForm() {
                                                        var latValue = document.getElementById('latitudeInput').value;
                                                        var lngValue = document.getElementById('longitudeInput').value;

                                                        if (!latValue || !lngValue) {
                                                            alert("Silakan klik pada peta untuk memilih lokasi.");
                                                            return false; // Mencegah pengiriman form
                                                        }
                                                        return true; // Mengizinkan pengiriman form
                                                    }
 
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

                        <?php foreach ($isu as $index => $row) { 
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($isu as $row) { 
                                            $idIsu = $row['id_isu'];
                                            $titleIsu = $row['title_isu'];
                                            $latitude = $row['latitude'];
                                            $longitude = $row['longitude'];
                                            $statusIsu = $row['status_isu'];
                                            // $titleOPD = $row['title_opd'];
                                        ?>
                                            <tr>
                                                <td><?= $titleIsu ?></td>
                                                <td><?= $latitude ?></td>
                                                <td><?= $longitude ?></td>
                                                <td><?= $statusIsu ?></td>
                                                <td>
                                                    <span class="badge bg-primary zoom-to" data-lat="<?= $latitude ?>" data-lng="<?= $longitude ?>" data-title="<?= $titleIsu ?>" style="cursor: pointer;">Zoom to</span>
                                                    <!-- <span class="badge bg-info" style="cursor: pointer;">Detail</span> -->
                                                    <a href="<?php echo base_url(); ?>isu/review/<?= $idIsu ?>">
                                                        <span class="badge bg-secondary" style="cursor: pointer;">Review</span>
                                                    </a>
                                                </td>
                                            </tr>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {

                                                    var currentMarker = null; // Simpan referensi marker yang aktif saat ini

                                                    // Fungsi untuk zoom ke koordinat
                                                    function zoomTo(lat, lng, titleIsu) {
                                                        map.setView([lat, lng], 17); // Zoom level 17 sebagai contoh
                                                        
                                                        // Jika ada marker aktif, hapus marker lama
                                                        if (currentMarker !== null) {
                                                            map.removeLayer(currentMarker);
                                                        }

                                                        // Buat marker baru dan simpan referensinya
                                                        currentMarker = L.marker([lat, lng]).addTo(map);
                                                        currentMarker.bindPopup(titleIsu).openPopup();
                                                    }

                                                    // Event listener untuk klik pada tombol 'Zoom to'
                                                    document.querySelectorAll('.zoom-to').forEach(function(element) {
                                                        element.addEventListener('click', function() {
                                                            var lat = parseFloat(this.getAttribute('data-lat'));
                                                            var lng = parseFloat(this.getAttribute('data-lng'));
                                                            var titleIsu = this.getAttribute('data-title');
                                                            zoomTo(lat, lng, titleIsu);
                                                        });
                                                    });
                                                });
                                            </script>

                                        <?php } ?>

                                        

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
                rowData.push(rows[i].cells[3].innerText); // Kolom Status Isu
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