<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONTER - Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="main" class='layout-navbar'>
            <?php $this->load->view("_partials/headnav.php") ?>

            <div id="main-content">

                <div class="page-heading">
                    <h3>Dashboard</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row">
                            <?php if ($this->session->userdata('logged_in')) : ?>
                                <?php if ($this->session->userdata('id_level_akun') === '1') : ?>
                                <div class="col-6 col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Jumlah Usulan Kegiatan</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo count($ajuan); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Jumlah Tervalidasi OPD</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo count($usulan); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php elseif (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldShow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Jumlah Usulan Kegiatan</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo count($ajuan); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Jumlah Tervalidasi OPD</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo count($usulan); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldAdd-User"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Jumlah Perencanaan (Monitoring)</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo count($monitor); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon red">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Jumlah Telah Dilaporkan OPD</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo count($laporkan); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php elseif ($this->session->userdata('id_level_akun') === '3'): ?>
                                        <div class="col-6 col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body px-3 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="stats-icon blue">
                                                                <i class="iconly-boldProfile"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-muted font-semibold">Jumlah Usulan Kegiatan</h6>
                                                            <h6 class="font-extrabold mb-0"><?php echo count($usulan); ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body px-3 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="stats-icon green">
                                                                <i class="iconly-boldAdd-User"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-muted font-semibold">Jumlah Perencanaan (Monitoring)</h6>
                                                            <h6 class="font-extrabold mb-0"><?php echo count($monitor); ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                            <?php else : ?>
                            <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Grafik Kegiatan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart-profile-visit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="assets/images/faces/1.jpg" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold"><?= $this->session->userdata("nama_akun") ?></h5>
                                            <h6 class="text-muted mb-0"><?= $this->session->userdata("email_akun") ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>

            </div>

        </div>
    </div>

    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/apexcharts/apexcharts.js"></script>
    <!-- <script src="assets/js/pages/dashboard.js"></script> -->
    
    <script>

        var statistikData = <?php echo json_encode($statistik); ?>;

        // Parsing dan mengelompokkan data
        var categories = [];
        var salesCounts = [];
        var otherCounts = []; // Dataset kedua

        // Mengelompokkan data berdasarkan bulan
        statistikData.forEach(function(item) {
            var date = new Date(item.month + '-01'); // Mengambil tanggal dari bulan
            var options = { year: 'numeric', month: 'short' };
            categories.push(date.toLocaleDateString('en-US', options)); // Format: "Sep 2024"
            salesCounts.push(parseInt(item.sales_count)); // Menyimpan jumlah penjualan untuk bulan yang sesuai
            otherCounts.push(parseInt(item.other_count)); // Dataset kedua, sesuaikan dengan nama field data lain
        });

        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled:false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity:1
            },
            plotOptions: {
                bar: {
                    columnWidth: '70%' // Sesuaikan lebar batang sesuai kebutuhan
                }
            },
            series: [{
                name: 'Jumlah Usulan Kegiatan',
                data: salesCounts
            }, {
                name: 'Jumlah Tervalidasi OPD', // Nama dataset kedua
                data: otherCounts
            }],
            colors: ['#435ebe', '#f57c00'], // Warna batang untuk tiap dataset
            xaxis: {
                categories: categories,
            },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();
    </script>

<script>
    var statistikData = <?php echo json_encode($statistik); ?>;
    console.log(statistikData); // Tambahkan log untuk melihat data yang diterima di JavaScript
</script>

    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    
</body>

</html>