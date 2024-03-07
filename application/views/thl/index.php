<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <a href="<?= base_url('thl/tambah') ?>" class="btn btn-outline-primary mb-2"><i class="fa  fa-plus"></i>&nbsp;Tambah Thl</a>

            <div class="card border border-secondary" style="overflow-x:auto;">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-4">
                            <strong class="card-title">List Member Thl</strong>
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

                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>QR CODE</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($thl as $k) : ?>
                                        <tr>
                                            <td><?= $i ?></td>

                                            <td><?= $k['nama'] ?></td>
                                            <td><?= $k['jenis_kelamin'] ?></td>
                                            <td>
                                                <a href="" onclick="qrCode('<?php echo $k['id_thl']; ?>')" class="btn btn-primary" data-toggle="modal" data-target="#qrCode">
                                                    Lihat QR Code
                                                </a>
                                            </td>
                                            <td>

                                                <a href="<?= base_url('thl/ubah/') . $k['id_thl'] ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                <a href="" onclick="hapus('<?php echo $k['id_thl']; ?>')" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i></a>

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


<script>
    function hapus(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('/thl/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $('[name="hapus"]').val(data.id_thl);

                $('#hapus').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function qrCode(id) {
        $.ajax({
            url: "<?php echo site_url('/thl/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data.qr_code)
                $('[name="hapus"]').val(data.nama);
                $('[name="id_nya"]').val(data.id_thl);
                $('#path').attr('src', data.qr_code);
                $('#qrCode').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function fetchQRCodeAndPrint(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo site_url('/thl/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                printQRCode(data.qr_code);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getting data from ajax');
            }
        });
    }

    function printQRCode(base64QrCode) {
        var printWindow = window.open('', '_blank', 'width=600,height=800');

        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print QR Code</title></head><body>');
        printWindow.document.write('<img src="' + base64QrCode + '" alt="QR Code" width="100%">');
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        printWindow.onload = function() {
            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
            };
        };
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
                    <form action="<?= base_url('thl/hapus') ?>" method="POST">
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


<!-- Modal -->
<div class="modal fade" id="qrCode" tabindex="-1" role="dialog" aria-labelledby="qrCodeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrCodeLabel">QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_nya" name="id_nya">
                NAMA: <input type="text" name="hapus">
                <br>
                <img id="path" src="" alt="QR Code" width="200" height="200">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" onclick="fetchQRCodeAndPrint($('#id_nya').val())">Cetak PDF</button>
            </div>
        </div>
    </div>
</div>