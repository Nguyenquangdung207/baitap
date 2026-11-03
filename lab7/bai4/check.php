<?php
/*
 * check.php - Bài 4
 * Nhận username và password từ AJAX, kiểm tra trong CSDL
 * Trả về thông báo HTML cho client
 */

header("Content-Type: text/html; charset=utf-8");

require_once("connect.php");

$user = isset($_GET['user']) ? trim($_GET['user']) : '';
$pass = isset($_GET['pass']) ? trim($_GET['pass'])  : '';

if ($user === '' || $pass === '') {
    echo "<span style='color:red;'>&#9888; Vui lòng nhập đầy đủ thông tin đăng nhập!</span>";
    exit;
}

// Dùng prepared statement để tránh SQL Injection
$sql  = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // Nếu mật khẩu được lưu dạng MD5 trong DB, thay $pass bằng md5($pass)
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<span style='color:green;'>&#10003; Đăng nhập thành công! Xin chào <b>" . htmlspecialchars($row['username']) . "</b>.</span>";
    } else {
        echo "<span style='color:red;'>&#10007; Sai tên đăng nhập hoặc mật khẩu. Vui lòng thử lại!</span>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<span style='color:red;'>Lỗi truy vấn: " . mysqli_error($con) . "</span>";
}

mysqli_close($con);
?>
