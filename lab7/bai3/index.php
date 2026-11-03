<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chức năng Live Search bằng PHP và AJAX</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 40px 60px;
            background-color: #f9f9f9;
        }

        h2 {
            color: navy;
            margin-bottom: 20px;
        }

        /* CSS cho search box */
        .search-box {
            width: 320px;
            position: relative;
            display: inline-block;
            font-size: 14px;
        }

        .search-box input[type="text"] {
            height: 36px;
            padding: 5px 12px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
            border-radius: 4px;
            outline: none;
            width: 100%;
            box-sizing: border-box;
        }

        .search-box input[type="text"]:focus {
            border-color: #5499d4;
            box-shadow: 0 0 4px rgba(84,153,212,0.4);
        }

        .result {
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #CCCCCC;
            border-top: none;
            border-radius: 0 0 4px 4px;
            width: 100%;
            box-sizing: border-box;
            max-height: 250px;
            overflow-y: auto;
        }

        /* CSS cho kết quả */
        .result p {
            margin: 0;
            padding: 8px 12px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            font-size: 14px;
        }

        .result p:hover {
            background: #f2f2f2;
        }

        .result p:last-child {
            border-bottom: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("input[type='text']").on("keyup", function () {
                var term = $(this).val().trim();
                var resultDiv = $(".result");

                if (term.length === 0) {
                    resultDiv.html("").hide();
                    return;
                }

                $.ajax({
                    url: "backend-search.php",
                    method: "GET",
                    data: { term: term },
                    success: function (data) {
                        resultDiv.html(data).show();
                    }
                });
            });

            // Click vào kết quả → điền vào ô tìm kiếm
            $(document).on("click", ".result p", function () {
                $("input[type='text']").val($(this).text());
                $(".result").html("").hide();
            });

            // Ẩn kết quả khi click ra ngoài
            $(document).click(function (e) {
                if (!$(e.target).closest(".search-box").length) {
                    $(".result").html("").hide();
                }
            });
        });
    </script>
</head>
<body>
    <h2>Tìm kiếm tên học phần (Live Search)</h2>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search tên học phần..." />
        <div class="result"></div>
    </div>
</body>
</html>
