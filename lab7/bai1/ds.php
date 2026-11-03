<?php
include("inc/connect.inc");

if (isset($_GET['lop'])) {
    $lop = mysqli_real_escape_string($con, $_GET['lop']);
    $sql = "SELECT masv, tensv, lop FROM sinhvien WHERE lop = '$lop' ORDER BY tensv";
    $rs = mysqli_query($con, $sql);

    if ($rs && mysqli_num_rows($rs) > 0) {
        echo "<table>";
        echo "<tr class='hd'><td>STT</td><td>Mã SV</td><td>Tên sinh viên</td><td>Lớp</td></tr>";
        $stt = 1;
        while ($row = mysqli_fetch_array($rs)) {
            echo "<tr>
                    <td>{$stt}</td>
                    <td>{$row['masv']}</td>
                    <td>{$row['tensv']}</td>
                    <td>{$row['lop']}</td>
                  </tr>";
            $stt++;
        }
        echo "</table>";
    } else {
        echo "<p>Không có sinh viên trong lớp này.</p>";
    }
}
?>
