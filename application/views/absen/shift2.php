<!-- MAIN CONTENT-->
<?= date_default_timezone_set('Asia/Makassar');
$tgl = date('Y-m-d'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Data </strong> Absensi (SHIFT 2)
                        </div>
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            </section>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="text-center">
                        <video id="cameraView" autoplay class="border border-danger mb-4 w-50"></video>
                    </div>
                    <?php if ($is_after_cutoff) : ?>
                        <div class="text-center">
                            <button onclick="startCamera()" class="btn btn-success mb-2">Start Camera</button>
                            <button onclick="stopCamera()" class="btn btn-danger mb-2">Stop Camera</button>
                            <button onclick="decodeQRCode()" class="btn btn-secondary mb-2">Scan Kode QR</button>
                        </div>
                        <div id="result" class="mt-4"> </div>
                        <form action="<?= base_url('absen/tambah_shift2') ?>" method="post">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="npnp" class="form-control-label">NPnP</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="npnp" name="npnp" disabled class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nama" class="form-control-label">Nama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="nama" name="nama" disabled class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" disabled class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="jabatan" class="form-control-label">Jabatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="jabatan" name="jabatan" disabled class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tanggal" class="form-control-label">Tanggal</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="tanggal" name="tanggal" readonly class="form-control" value="<?= $tgl ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="jam" class="form-control-label">Jam</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="jam" name="jam" readonly class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="id_thl" id="id_thl">
                            <button id="proses" type="submit" disabled class="btn btn-info mb-2 float-right">Ambil Absen</button>
                        </form>
                    <?php else : ?>
                        <div class="text-center">
                            <span class="badge badge-danger">Maaf Sudah Lewat Jam Shift!</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer"></div>
            </div>

            <?php
            date_default_timezone_set('Asia/Makassar');
            $tahun = date('Y');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?= $tahun ?> DINAS</p>
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