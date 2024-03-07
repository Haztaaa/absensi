<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">


            <div class="card border border-secondary" style="overflow-x:auto;">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-4">
                            <strong class="card-title">List Data Absensi</strong>
                        </div>
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            </section>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-borderless table-data2" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NPnP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Jam Shift 1 </th>
                                        <th>Jam Shift 2 </th>
                                        <th>Shift 1 </th>
                                        <th>Shift 2 </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($absen as $k) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $k['npnp'] ?></td>
                                            <td><?= $k['nama'] ?></td>
                                            <td><?= $k['jabatan'] ?></td>
                                            <td><?= $k['tanggal'] ?></td>
                                            <td><?= $k['jam1'] ?></td>
                                            <td><?= $k['jam2'] ?></td>
                                            <td>
                                                <?php if ($k['jam1'] == 0) : ?>
                                                    <span class="badge badge-danger">Tidak Hadir</span>
                                                <?php else : ?>
                                                    <span class="badge badge-info">Hadir</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($k['jam2'] == 0) : ?>
                                                    <span class="badge badge-danger">Tidak Hadir</span>
                                                <?php else : ?>
                                                    <span class="badge badge-info">Hadir</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($k['shift1'] && $k['shift2']) : ?>
                                                    <span class="badge badge-info">Data Kerja Selesai!</span>
                                                <?php elseif ($k['shift2']) : ?>
                                                    <span class="badge badge-info">Data Kerja Selesai!</span>
                                                <?php elseif (empty($k['shift1']) && empty($k['shift2'])) : ?>
                                                    <a href="<?= base_url('absen/kerja/') . $k['id_absen'] ?>" class="btn btn-success mb-2"><i class="fas fa-edit"> Kerja</i></i></a>
                                                <?php elseif (($k['shift1']) && empty($k['shift2'])) : ?>
                                                    <a href="<?= base_url('absen/kerja/') . $k['id_absen'] ?>" class="btn btn-success mb-2"><i class="fas fa-edit"> Kerja</i></i></a>
                                                <?php elseif ($k['shift1']) : ?>
                                                    <span class="badge badge-info">Mohon Menunggu Shift2</span>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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


<script>
    function hapus(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('/dptb/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="hapus"]').val(data.id_dptb);
                $('#hapus').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>
<div class="">
    <!-- Modal -->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusLabel">Notifikasi</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">
                    <span class="badge badge-danger">Perhatian!</span>
                    <p>Data Yang Dipilih Akan Dihapus!
                    </p>
                    <form action="<?= base_url('dptb/hapus') ?>" method="POST">
                        <input type="hidden" name="hapus">
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button class="btn btn-primary" type="submit">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>