<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <div class="logo">
                            <img src="<?= base_url('assets/img/logo.jpeg') ?>" alt="" width="80px">

                        </div>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="fas fa-desktop"></i>Beranda</a>
                        </li>
                        <?php if ($this->session->userdata('level') == 1) : ?>
                            <li>
                                <a href="<?= base_url('leader_kecamatan') ?>">
                                    <i class="fa fa-users"></i>List Leader Kecamatan</a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('level') == 1) : ?>
                            <li>
                                <a href="<?= base_url('leader_kelurahan') ?>">
                                    <i class="fa fa-users"></i>List Leader Kelurahan</a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('level') == 2) : ?>
                            <li>
                                <a href="<?= base_url('leader_kelurahan') ?>">
                                    <i class="fa fa-users"></i>List Leader Kelurahan</a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('level') != 4) : ?>
                            <li>
                                <a href="<?= base_url('leader_tps') ?>">
                                    <i class="fa fa-users"></i>List Leader TPS</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?= base_url('dpt') ?>">
                                <i class="fa fa-users"></i>List Member DPT</a>
                        </li>
                        <li>
                            <a href="<?= base_url('dptb') ?>">
                                <i class="fa fa-users"></i>List Member DPTB</a>
                        </li>
                        <?php if ($this->session->userdata('level') == 1) : ?>
                            <li>
                                <a href="<?= base_url('maping') ?>">
                                    <i class="fas fa-map-marker-alt"></i>Data TPS</a>

                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <img src="<?= base_url('assets/img/logo.jpeg') ?>" alt="" width="80px">
                <h1 style="color: #741919;">Absensi</h1>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="fas fa-desktop"></i>Beranda</a>
                        </li>
                        <?php if ($this->session->userdata('level') == 1) : ?>
                            <li>
                                <a href="<?= base_url('thl') ?>">
                                    <i class="fa fa-users"></i>Data THL</a>
                            </li>
                        <?php endif; ?>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-calendar"></i>Data Absen </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?= base_url('absen') ?>">Ambil Absen Shift 1</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('absen/shift2') ?>">Ambil Absen Shift 2</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('absen/data') ?>">Data Absensi</a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="<?= base_url('riwayat') ?>">
                                <i class="fa fa-table"></i>Riwayat Pekerjaan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('rekap') ?>">
                                <i class="fa fa-table"></i>Rekap Absen</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="hidden" placeholder="Search for datas &amp; reports..." />

                            </form>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url('assets/') ?>images/icon/profile.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $user['nama'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/') ?>images/icon/profile.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $user['username'] ?></a>
                                                    </h5>
                                                    <span class="email"><?= $user['nama'] ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Akun</a>
                                                </div> -->
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('dashboard/pengaturan') ?>">
                                                        <i class="zmdi zmdi-settings"></i>Pengaturan</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('auth/logout') ?>">
                                                    <i class="zmdi zmdi-power"></i>Keluar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->