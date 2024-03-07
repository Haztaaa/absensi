<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php if ($this->session->userdata('level') == 1) : ?>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-4">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?= $all ?></h2>
                                        <span>Total Semua THL</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account"></i>
                                    </div>
                                    <div class="text">
                                        <h2></h2>
                                        <span>Absen Hari Ini</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2></h2>
                                        <span>Tidak Absen Hari Ini</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Grafik Total Data</h3>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>


            <?php
            date_default_timezone_set('Asia/Makassar');
            $tahun = date('Y');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?= $tahun ?> IDR CENTER</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>