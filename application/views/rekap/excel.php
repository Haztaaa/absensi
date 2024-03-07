<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title $month_name.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h2 class="mb-3">Rekap Absen (<?= $month_name ?>)</h2>
<table border="1">
    <thead>
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

            // Initialize arrays to track shift attendance
            $shift1_attendance = array_fill(1, $total_days, 'Tidak Hadir');
            $shift2_attendance = array_fill(1, $total_days, 'Tidak Hadir');

            $bulan_sekarang = $selected_month;

            foreach ($absen as $row) {
                if ($row['nama'] == $nama_thl && date('m', strtotime($row['tanggal'])) == $bulan_sekarang) {
                    $day = date('j', strtotime($row['tanggal']));

                    // Check and update shift1 attendance
                    if ($row['jam1'] != 0) {
                        $shift1_attendance[$day] = 'Hadir';
                    }

                    // Check and update shift2 attendance
                    if ($row['jam2'] != 0) {
                        $shift2_attendance[$day] = 'Hadir';
                    }
                }
            }
            // Output attendance status for each day and shift
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