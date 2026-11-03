<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lab 7 - PHP & AJAX</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px 60px; background: #f0f4f8; }
        h1 { color: navy; }
        .cards { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px; }
        .card {
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px 28px;
            width: 220px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #222;
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .card:hover { transform: translateY(-4px); box-shadow: 4px 6px 16px rgba(0,0,0,0.18); }
        .card h2 { font-size: 15pt; color: navy; margin: 0 0 8px 0; }
        .card p  { font-size: 11pt; color: #555; margin: 0; }
        .badge {
            display: inline-block;
            font-size: 9pt;
            background: #e8f0fe;
            color: #1a73e8;
            border-radius: 12px;
            padding: 2px 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>🧪 Lab 7 – PHP &amp; AJAX</h1>
    <p>Chọn bài để xem demo:</p>
    <div class="cards">
        <a class="card" href="bai1/danhsach.php">
            <h2>Bài 1</h2>
            <p>In danh sách sinh viên theo từng lớp</p>
            <span class="badge">AJAX thuần</span>
        </a>
        <a class="card" href="bai2/index.php">
            <h2>Bài 2</h2>
            <p>Hiển thị bảng dữ liệu (OOP + AJAX)</p>
            <span class="badge">OOP – PDO – jQuery</span>
        </a>
        <a class="card" href="bai3/index.php">
            <h2>Bài 3</h2>
            <p>Live Search tên học phần</p>
            <span class="badge">jQuery AJAX</span>
        </a>
        <a class="card" href="bai4/login.html">
            <h2>Bài 4</h2>
            <p>Đăng nhập AJAX</p>
            <span class="badge">jQuery AJAX</span>
        </a>
    </div>
</body>
</html>
