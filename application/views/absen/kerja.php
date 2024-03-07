<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <strong>Tambah</strong> Data Kerja THL
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('absen/kerja/') . $val['id_absen']  ?>" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="npnp" class="form-control-label">NPnP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="npnp" name="npnp" value="<?= $val['npnp'] ?>" class="form-control" disabled>
                                <?= form_error('npnp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class="form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama" name="nama" value="<?= $val['nama'] ?>" class="form-control" disabled>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jenis_kelamin" class="form-control-label">jenis_kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?= $val['jenis_kelamin'] ?>" class="form-control" disabled>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jabatan" class="form-control-label">Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="jabatan" name="jabatan" value="<?= $val['jabatan'] ?>" class="form-control" disabled>
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="shift1" class="form-control-label">Kerja Shift 1</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <?php if ($shift1_readonly) : ?>
                                    <input type="text" id="shift1" name="shift1" value="<?= $shift1_value ?>" readonly class="form-control">
                                <?php else : ?>
                                    <input type="text" id="shift1" name="shift1" placeholder="Masukkan Riwayat Pekerjaan" class="form-control">
                                <?php endif; ?>
                                <?= form_error('shift1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="shift2" class="form-control-label">Kerja Shift 2</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="shift2" name="shift2" placeholder="Masukkan Riwayat Pekerjaan" class="form-control" <?= ($disable_shift2) ? 'disabled' : ''; ?>>
                                <?= form_error('shift2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    </form>
                    <a href="<?= base_url('absen/data') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>

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