-- ============================================================
-- CSDL udn – dùng chung cho Lab 7
-- HƯỚNG DẪN IMPORT:
--   Trong phpMyAdmin: chọn database "udn" ở sidebar TRƯỚC,
--   rồi mới vào Import → chọn file này.
-- ============================================================

-- ------------------------------------------------------------
-- Bảng sinhvien  (Bài 1, 2)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sinhvien` (
    `masv`   VARCHAR(15)   NOT NULL,
    `tensv`  VARCHAR(50)   NOT NULL,
    `lop`    VARCHAR(20)   NOT NULL,
    PRIMARY KEY (`masv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `sinhvien` (`masv`, `tensv`, `lop`) VALUES
('SV001', 'Nguyen Van An',    'CNTT1'),
('SV002', 'Tran Thi Binh',    'CNTT1'),
('SV003', 'Le Van Cuong',     'CNTT1'),
('SV004', 'Pham Thi Dung',    'CNTT2'),
('SV005', 'Hoang Van Em',     'CNTT2'),
('SV006', 'Dang Thi Phuong',  'CNTT2'),
('SV007', 'Vu Van Giang',     'CNTT3'),
('SV008', 'Bui Thi Hoa',      'CNTT3'),
('SV009', 'Dinh Van Inh',     'CNTT3'),
('SV010', 'Do Thi Kim',       'CNTT3');

-- ------------------------------------------------------------
-- Bảng giaovien  (Bài 2)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `giaovien` (
    `magv`   VARCHAR(10)   NOT NULL,
    `tengv`  VARCHAR(50)   NOT NULL,
    `bomon`  VARCHAR(50)   DEFAULT NULL,
    `email`  VARCHAR(100)  DEFAULT NULL,
    PRIMARY KEY (`magv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `giaovien` (`magv`, `tengv`, `bomon`, `email`) VALUES
('GV01', 'Nguyen Van Alpha',  'Cong nghe thong tin', 'alpha@udn.vn'),
('GV02', 'Tran Thi Beta',     'Toan tin',            'beta@udn.vn'),
('GV03', 'Le Van Gamma',      'Vat ly',              'gamma@udn.vn'),
('GV04', 'Pham Thi Delta',    'Cong nghe thong tin', 'delta@udn.vn');

-- ------------------------------------------------------------
-- Bảng hocphan  (Bài 2, 3)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `hocphan` (
    `mahp`   VARCHAR(10)   NOT NULL,
    `tenhp`  VARCHAR(100)  NOT NULL,
    `sotc`   TINYINT       DEFAULT 3,
    PRIMARY KEY (`mahp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `hocphan` (`mahp`, `tenhp`, `sotc`) VALUES
('HP001', 'Lap trinh Web',                  3),
('HP002', 'Co so du lieu',                  3),
('HP003', 'Lap trinh huong doi tuong',      3),
('HP004', 'Mang may tinh',                  3),
('HP005', 'Tri tue nhan tao',               3),
('HP006', 'Lap trinh di dong',              3),
('HP007', 'An toan thong tin',              3),
('HP008', 'He dieu hanh',                   2),
('HP009', 'Toan roi rac',                   3),
('HP010', 'Ky thuat lap trinh',             3);

-- ------------------------------------------------------------
-- Bảng users  (Bài 4 - Đăng nhập)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
    `id`       INT          NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50)  NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `users` (`username`, `password`) VALUES
('admin', 'admin123'),
('student', '123456'),
('giaovien', 'gv2024');
