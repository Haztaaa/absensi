<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">

                    <div class="au-card">
                        <div class="box-body box-profile">
                            <div class="image img-cir img-120 " style="margin-left: 50px;">
                                <img src="<?= base_url('assets/') ?>images/icon/profile.png" alt="John Doe">
                            </div>
                            <h3 class="profile-username text-center"><?= $user['nama'] ?></h3>
                            <p class="text-muted text-center"><?= $user['username'] ?></p>


                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Ubah Password</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> <?= $this->session->flashdata('message'); ?></h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('dashboard/password') ?>" method="post">
                                <input type="hidden" name="id_user" id="" value="<?= $user['id_user'] ?>">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Massukan Password Yang Baru</label>
                                    <input id="" name="password_baru" type="password" class="form-control" aria-required="true" aria-invalid="false">
                                    <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Massukan Kembali Password Yang Baru</label>
                                    <input id="" name="konfirmasi_password" type="password" class="form-control" aria-required="true" aria-invalid="false">
                                    <?= form_error('konfirmasi_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-edit fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Ubah Password</span>

                                    </button>
                                    <a href="<?= base_url('dashboard') ?>" class="btn btn-lg btn-danger btn-block"> <i class="fa fa-arrow-left fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Kembali</span></a>

                                </div>
                            </form>
                        </div>
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