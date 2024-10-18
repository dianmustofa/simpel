<?php if ($this->session->userdata('logged_in')) : ?>
<div id="sidebar" class="active">
<?php else : ?>
<div id="sidebar">
<?php endif; ?>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
            <?php if ($this->session->userdata('logged_in')) : ?>
                <?php if ($this->session->userdata('id_level_akun') === '1') : ?>
                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>isu" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Isu Lingkungan</span>
                    </a>
                </li>

                <li class="sidebar-title">Informasi</li>

                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>literasi" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Literasi Pengetahuan</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>tentang" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>

                <?php elseif (in_array($this->session->userdata('id_level_akun'), [2, 4])) : ?>

                    <li class="sidebar-item  ">
                        <a href="<?php echo base_url();?>" class='sidebar-link'>
                            <i class="bi bi-house-fill"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo base_url();?>dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?php echo base_url();?>user" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>User</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?php echo base_url();?>isu" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Isu Lingkungan</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Tabel</li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Kegiatan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="<?php echo base_url();?>usulan">Usulan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="<?php echo base_url();?>verifikasi-usulan">Verifikasi</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?php echo base_url();?>monitoring" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Monitoring</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?php echo base_url();?>laporan" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Laporan Tahunan</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Informasi</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo base_url();?>literasi" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Literasi Pengetahuan</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo base_url();?>tentang" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Tentang Kami</span>
                        </a>
                    </li>

                    <?php elseif ($this->session->userdata('id_level_akun') === '3') : ?>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Tabel</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Kegiatan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url();?>usulan">Usulan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>monitoring" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Monitoring</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Informasi</li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>literasi" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Literasi Pengetahuan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>tentang" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>

                    <?php else : ?>

                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Informasi</li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>literasi" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Literasi Pengetahuan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url();?>tentang" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>

                        <?php endif; ?>

            <?php else : ?>

                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="sidebar-title">Informasi</li>

                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>literasi" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Literasi Pengetahuan</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="<?php echo base_url();?>tentang" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>

                <?php endif; ?>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>