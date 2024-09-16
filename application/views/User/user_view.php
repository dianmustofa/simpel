<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    <?php $this->load->view("_partials/head.php") ?>
    
    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
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
                                <h3>Katalog User</h3>
                                <p class="text-subtitle text-muted">Berikut list user pada portal SIMPEL.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>tambah-akun" class="btn btn-primary">+ User Pengguna</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Basic card section start -->
                    <div class="page-content">
                        <section class="row">
                            <div class="col-12 col-lg-9">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>Email</th>
                                                                <th>Jabatan</th>
                                                                <th>Aksi</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($akun as $row) { 
                                                            $namaAkun = $row['nama_akun'];
                                                            $emailAkun = $row['email_akun'];
                                                            $nomorAkun = $row['nomor_akun'];
                                                            $titleLevel = $row['title_level'];
                                                        ?>
                                                            <tr>
                                                                <td class="col-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-md">
                                                                            <img src="assets/images/faces/5.jpg">
                                                                        </div>
                                                                        <p class="font-bold ms-3 mb-0"><?= $namaAkun ?></p>
                                                                    </div>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0"><?= $emailAkun ?></p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0"><?= $titleLevel ?></p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">Edit</p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">Hapus</p>
                                                                </td>
                                                            </tr>

                                                        <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
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
                    <!-- Basic Card types section end -->

                </div>

                <?php $this->load->view("_partials/footer.php") ?>

            </div>
        </div>
    </div>

    <!-- js -->
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- end js -->

</body>

</html>