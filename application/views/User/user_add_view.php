<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Group - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="main">
            <?php $this->load->view("_partials/headnav.php") ?>

            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Tambah User</h3>
                                <p class="text-subtitle text-muted">Tambah akun dengan melakukan pengisian form dibawah</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">tambah user</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- // Basic multiple Column Form section start -->
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tambah User</h4>
                                    </div>
                                    <?php if($this->session->flashdata('response') != ""){ ?>
                                        <?php 
                                        $status = $this->session->flashdata('response')['sts'];
                                        if($status=="success") $alert = "success";
                                        else $alert="danger";
                                        ?>
                                        <div class="alert alert-<?php echo $alert;?>" role="alert">
                                            <?php echo $this->session->flashdata('response')['msg'];?>
                                        </div>
                                    <?php } ?>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="<?php echo base_url().'auth/add_user'?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Nama</label>
                                                            <input type="text" id="first-name-column" class="form-control"
                                                                placeholder="Nama Lengkap" name="nama_akun" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Email</label>
                                                            <input type="email" id="email-id-column" class="form-control"
                                                                name="email_akun" placeholder="Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">No Handphone</label>
                                                            <input type="text" id="last-name-column" class="form-control"
                                                                placeholder="Nomor HP" name="nomor_akun" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Kata sandi</label>
                                                            <input type="password" id="city-column" class="form-control"
                                                                placeholder="Password" name="sandi_akun" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Alamat</label>
                                                            <input type="text" id="country-floating" class="form-control"
                                                                name="alamat_akun" placeholder="Jl. Sawah Lunto" required>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">RT</label>
                                                            <input type="text" id="country-floating" class="form-control"
                                                                name="country-floating" placeholder="RT 003">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">RW</label>
                                                            <input type="text" id="country-floating" class="form-control"
                                                                name="country-floating" placeholder="RW 010">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Kelurahan</label>
                                                            <input type="text" id="country-floating" class="form-control"
                                                                name="country-floating" placeholder="Kelurahan Tebet">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Kecamatan</label>
                                                            <input type="text" id="country-floating" class="form-control"
                                                                name="country-floating" placeholder="Kecamtan Gambir">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Wilayah/Kota</label>
                                                            <input type="text" id="country-floating" class="form-control"
                                                                name="country-floating" placeholder="Jakarta Selatan">
                                                        </div>
                                                    </div> -->

                                                    <?php 
                                                        $jenis="";
                                                    if(isset($default['level'])) $jenis=$default['level'];
                                                    ?>

                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="country-floating">Level Akun</label>
                                                            <select class="choices form-select" name="id_level_akun">
                                                                <!-- Pastikan $level_akun ada dan bukan kosong -->
                                                                <?php if (!empty($level_akun)): ?>
                                                                    <?php foreach ($level_akun as $row): ?>
                                                                        <option value="<?= htmlspecialchars($row['id_level'], ENT_QUOTES, 'UTF-8') ?>">
                                                                            <?= htmlspecialchars($row['title_level'], ENT_QUOTES, 'UTF-8') ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">Level akun tidak tersedia</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- <div class="form-group col-12">
                                                        <div class='form-check'>
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="checkbox5"
                                                                    class='form-check-input' checked>
                                                                <label for="checkbox5">Akun aktif</label>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- // Basic multiple Column Form section end -->
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>

</html>