<?php
require_once("database.class.php");

$allowedTables = ['giaovien', 'sinhvien', 'hocphan'];
$table = isset($_GET['table']) ? trim($_GET['table']) : '';

if (!in_array($table, $allowedTables)) {
    echo "<p style='color:red;'>Bảng không hợp lệ.</p>";
    exit;
}

$db = new Database();
$columns = $db->getColumns($table);
$rows = $db->getAll($table);

$tableNames = [
    'giaovien' => 'Giáo viên',
    'sinhvien'  => 'Sinh viên',
    'hocphan'   => 'Học phần',
];

echo "<h2>Bảng: " . htmlspecialchars($tableNames[$table]) . "</h2>";
echo "<table>";
echo "<thead><tr class='hd'>";
foreach ($columns as $col) {
    echo "<th>" . htmlspecialchars($col) . "</th>";
}
echo "</tr></thead><tbody>";

if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($columns as $col) {
            echo "<td>" . htmlspecialchars($row[$col] ?? '') . "</td>";
        }
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='" . count($columns) . "'>Không có dữ liệu.</td></tr>";
}

echo "</tbody></table>";
?>
