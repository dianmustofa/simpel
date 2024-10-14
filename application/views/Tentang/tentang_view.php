<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMONTER - Tentang Kami</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <!-- end css -->
</head>

<body>
    <div id="app">

        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="main" class='layout-navbar'>
            
            <?php $this->load->view("_partials/headnav.php") ?>

            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Tentang Kami</h3>
                                <p class="text-subtitle text-muted">Sistem Informasi Monitoring Terintegrasi Community Action Plan dan Collaborative Implementation Program.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tentang kami
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">SIMONTER-CAPCIP</h4>
                            </div>
                            <div class="card-body">
                            <p>
                                <strong>SIMONTER-CAPCIP</strong> adalah Sistem Informasi Monitoring Terintegrasi Community Action Plan dan Collaborative Implementation Program. SIMONTER-CAPCIP merupakan platform digital perencanaan dan pengawasan penataan permukiman berbasis web sebagai media publikasi, interaksi, dan monitoring bersama semua stakeholders dalam rangka peningkatan kualitas permukiman RW kumuh.
                            </p>
                            <p>
                                SIMONTER-CAPCIP dapat memfasilitasi:
                            </p>
                                    <ol>
                                        <li>
                                            <strong>PUBLIKASI</strong> – Sharing informasi kepada masyarakat dan semua stakeholders terkait administrasi lokasi penataan, kondisi kependudukan, peruntukan ruang, analisa isu dan permasalahan lingkungan, perkembangan perencanaan CAP dan pengawasan pelaksanaan CIP yang dapat diakses secara mudah, tepat, dan cepat melalui internet, sehingga dapat mendekatkan pelayanan kepada masyarakat dan memberikan akses yang lebih luas kepada masyarakat dan semua stakeholders terkait untuk memperoleh pelayanan.
                                        </li>
                                        <li>
                                            <strong>INTERAKSI</strong> – Fasilitasi partisipasi masyarakat dan kolaborasi antar stakeholders dalam perencanaan CAP dan pengawasan pelaksanaan CIP, agar dapat mewujudkan proses pelayanan yang cepat, mudah, dan transparan bagi masyarakat sehingga meningkatkan efisiensi, kenyamanan serta aksesibilitas antar pemangku kepentingan.
                                        </li>
                                        <li>
                                            <strong>MONITORING</strong> – Pemantauan, evaluasi, dan pelaporan yang bisa diakses oleh semua stakeholders untuk memonitor progress perencanaan secara real time, detail, dan akuntabel, melacak implementasi rencana penataan lingkungan dan mengevaluasi dampaknya serta mempermudah pelaporan kemajuan pencapaian kegiatan perencanaan CAP dan pengawasan pelaksanaan CIP.
                                        </li>
                                    </ol>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- <?php $this->load->view("_partials/footer.php") ?> -->

            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- end js -->
</body>

</html>