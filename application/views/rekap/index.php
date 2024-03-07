<!-- MAIN CONTENT-->
<?php date_default_timezone_set('Asia/Makassar') ?>
<?php
// Ambil nilai bulan yang dipilih dari formulir
if (isset($_POST['selected_month'])) {
    $selected_month = $_POST['selected_month'];

    // Tampilkan data sesuai dengan bulan yang dipilih
    $total_days = date('t', strtotime(date("{$selected_month}/1/Y"))); // Mendapatkan total hari pada bulan yang dipilih
    $month_name = date('F', strtotime(date("{$selected_month}/1/Y"))); // Mendapatkan nama bulan
    $month_name = date('F', strtotime(date("{$selected_month}/1/Y"))); // Mendapatkan nama bulan

    // ... (sisa kode tetap sama seperti sebelumnya) ...
}
?>
<?php if (empty($selected_month)) {
    $selected_month = date('m');
    $month_name = date('F');
    $total_days = date('t');
} ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Data </strong> Pekerjaan
                        </div>
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <h2 class="mb-3">Rekap Absen (<?= $month_name ?>)</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                <select name="selected_month" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Pilih</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="<?= base_url('rekap/excel/' . $total_days . '/' . $selected_month . '/' . $month_name); ?>" class="btn btn-success">Cetak Excel</a>

                        </div>
                    </div>

                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="100" align="center"><?= $month_name ?></th>
                                </tr>
                                <tr>
                                    <th>Nama THL</th>

                                    <?php

                                    for ($i = 1; $i <= $total_days; $i++) {
                                        echo "<th colspan='2'>$i</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <th></th>
                                    <?php
                                    for ($day = 1; $day <= $total_days; $day++) {
                                        echo "<th>Shift 1</th>";
                                        echo "<th>Shift 2</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil daftar nama THL dari data absen
                                $nama_thl_list = array_unique(array_column($absen, 'nama'));

                                foreach ($nama_thl_list as $nama_thl) {
                                    echo "<tr>";
                                    echo "<td>$nama_thl</td>";

                                    $shift1_attendance = array_fill(1, $total_days, 'Tidak Hadir');
                                    $shift2_attendance = array_fill(1, $total_days, 'Tidak Hadir');

                                    $bulan_sekarang = $selected_month;

                                    foreach ($absen as $row) {
                                        if ($row['nama'] == $nama_thl && date('m', strtotime($row['tanggal'])) == $bulan_sekarang) {
                                            $day = date('j', strtotime($row['tanggal']));
                                            if ($row['jam1'] != 0) {
                                                $shift1_attendance[$day] = 'Hadir';
                                            }
                                            if ($row['jam2'] != 0) {
                                                $shift2_attendance[$day] = 'Hadir';
                                            }
                                        }
                                    }
                                    for ($day = 1; $day <= $total_days; $day++) {
                                        $shift1_color = ($shift1_attendance[$day] == 'Tidak Hadir') ? 'style="color: red;"' : 'style="color: green;"';
                                        $shift2_color = ($shift2_attendance[$day] == 'Tidak Hadir') ? 'style="color: red;"' : 'style="color: green;"';

                                        echo "<td><span $shift1_color>{$shift1_attendance[$day]}</span></td>";
                                        echo "<td><span $shift2_color>{$shift2_attendance[$day]}</span></td>";
                                    }

                                    echo "</tr>";
                                }
                                ?>
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