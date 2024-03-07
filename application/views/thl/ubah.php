<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <strong>Ubah</strong> Data THL
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('thl/ubah/') . $val['id_thl']  ?>" method="post" class="form-horizontal">




                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="npnp" class="form-control-label">NPnP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="npnp" name="npnp" placeholder="Masukkan npnp" class="form-control" value="<?= $val['npnp'] ?>">
                                <?= form_error('npnp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class="form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $val['nama'] ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jenis_kelamin" class=" form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control-sm form-control">
                                    <?php if ($val['jenis_kelamin'] == 'Laki-Laki') : ?>
                                        <option value="Laki-Laki" selected>Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>

                                    <?php else : ?>
                                        <option value="Laki-Laki">Laki Laki</option>
                                        <option value="Perempuan" selected>Perempuan</option>
                                    <?php endif; ?>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jabatan" class="form-control-label">Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" class="form-control" value="<?= $val['jabatan'] ?>">
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>Ubah
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