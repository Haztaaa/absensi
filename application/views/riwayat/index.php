<!-- MAIN CONTENT-->
<?php date_default_timezone_set('Asia/Makassar');
$today = date('Y-m-d');
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-6">
                            <strong>Data Riwayat</strong> Pekerjaan (<?= $today ?>)
                        </div>

                    </div>

                </div>

                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NPnP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal</th>

                                    <th>Shift 1 </th>
                                    <th>Shift 2 </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($riwayat as $k) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $k['npnp'] ?></td>
                                        <td><?= $k['nama'] ?></td>
                                        <td><?= $k['jabatan'] ?></td>
                                        <td><?= $k['tanggal'] ?></td>

                                        <td>
                                            <?php if (empty($k['shift1'])) : ?>
                                                <div class="p-2 mb-2 bg-danger text-white">
                                                    Tidak Hadir
                                                </div>

                                            <?php else : ?>
                                                <div class="p-2 mb-2 bg-success text-white">
                                                    <?= $k['shift1'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (empty($k['shift2'])) : ?>
                                                <div class="p-2 mb-2 bg-danger text-white">
                                                    Tidak Hadir
                                                </div>

                                            <?php else : ?>
                                                <div class="p-2 mb-2 bg-success text-white">
                                                    <?= $k['shift2'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>



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