<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <strong>Tambah</strong> Data THL
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('thl/tambah')  ?>" method="post" class="form-horizontal">




                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="npnp" class="form-control-label">NPnP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="npnp" name="npnp" placeholder="Masukkan npnp" class="form-control">
                                <?= form_error('npnp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class="form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" class="form-control">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jenis_kelamin" class=" form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control-sm form-control">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jabatan" class="form-control-label">Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" class="form-control">
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    </form>
                    <a href="<?= base_url('thl') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>

                </div>
            </div>


            <?php
            date_default_timezone_set('Asia/Makassar');
            $tahun = date('Y');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?= $tahun ?> Dinas</p>
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