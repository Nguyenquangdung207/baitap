<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP with PHP</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function ajax() {
            var table = document.getElementById("chon").value;
            if (table === "") {
                $("#info").hide();
                return;
            }
            $.ajax({
                url: "showTable.php",
                method: "GET",
                data: { table: table },
                success: function (data) {
                    $("#info").html(data).show();
                },
                error: function () {
                    $("#info").html("<p>Lỗi khi tải dữ liệu.</p>").show();
                }
            });
        }
    </script>
</head>
<body>
    <h1>OOP with PHP</h1>
    <select id="chon" onChange="ajax();">
        <option value="">-->-Chọn-<--</option>
        <option value="giaovien">Giáo viên</option>
        <option value="sinhvien">Sinh viên</option>
        <option value="hocphan">Học phần</option>
    </select>
    <hr>
    <div id="info" style="display:none;"></div>
</body>
</html>
