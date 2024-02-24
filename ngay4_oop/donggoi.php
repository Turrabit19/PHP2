<?php
// Định nghĩa ra 1 class SinhVien
class SinhVien {
    // Khai báo các thuộc tính (Biến trong class)
    public $hoTen;
    public $namSinh;
    public $maSV;

    // Magic function (Hàm khởi tạo)
    // Tên hàm __construct là cố định và không thể thay đổi
    // PHP sẽ tự động tìm và ưu tiên chạy hàm này đầu tiên nếu nó tồn tại
    // Thường dùng để khởi tạo các giá trị ban đầu của thuộc tính
    public function __construct($hoTen, $namSinh, $maSV)
    {
        $this->hoTen = $hoTen;
        $this->namSinh = $namSinh;
        $this->maSV = $maSV;
    }

    public function tinhTuoi() {
        $age = date('Y') - $this->namSinh;
        return $age;
    }

    // Phương thức để set giá trị cho thuộc tính hoTen
    // Set giá trị cho 1 thuộc tính riêng biệt
//    public function setHoTen($hoTen)
//    {
//        $this->hoTen = $hoTen;
//    }
//
//    public function setNamSinh($namSinh)
//    {
//        $this->namSinh = $namSinh;
//    }
//
//    public function setMaSV($maSV)
//    {
//        $this->maSV = $maSV;
//    }

    // Khai báo 1 phương thức
    public function hienThiThongTin()
    {
        // Để sử dụng thuộc tính trong class ==> Ta sẽ dùng cấu trúc sau
        // $this -> Tên thuộc tính
        echo $this->hoTen . "<br>";
        echo $this->namSinh . "<br>";
        echo $this->maSV . "<br>";
        echo $this->tinhTuoi();
    }
}
// Khởi tạo 1 đối tượng
//$sv1 = new SinhVien("Trần Đức Khang", 2004, "PH44354");
// Gắn giá trị cho thuộc tính

//$sv1->setHoTen("Trần Đức Khang");
//$sv1->setNamSinh("19/09/2004");
//$sv1->setMaSV("PH44354");

//$sv1->hienThiThongTin();

// Khởi tạo 1 đối tượng SinhVien mới
// Hiển thị các thông tin ra màn hình
// Xây dựng thêm 1 phương thức có trả về tham số tinhTuoi
// tuoi = năm hiện tại - namSinh
// Hiển thị tất cả thông tin ra màn hình
// ten, namSinh, maSV, tuoi

//$sv2 = new SinhVien("Trần Đức Khang", 2004, "PH44354");
//$sv2->hienThiThongTin();



class GiangVien {
    public $maGV;
    public $tenGV;
    public $namBatDau;
    public $luongGV;
    public $soGioDay;

    public function __construct($maGV, $tenGV, $namBatDau, $luongGV, $soGioDay)
    {
        $this->maGV = $maGV;
        $this->tenGV = $tenGV;
        $this->namBatDau = $namBatDau;
        $this->luongGV = $luongGV;
        $this->soGioDay = $soGioDay;
    }

    public function tongLuong() {
        $tongLuong = $this->luongGV * $this->soGioDay;
        return $tongLuong;
    }

    public function hienThiThongTin()
    {
        // Để sử dụng thuộc tính trong class ==> Ta sẽ dùng cấu trúc sau
        // $this -> Tên thuộc tính
        echo $this->maGV . "<br>";
        echo $this->tenGV . "<br>";
        echo $this->namBatDau . "<br>";
        echo $this->luongGV . "đ<br>";
        echo $this->soGioDay . "<br>";
        echo $this->tongLuong() . "đ <br>" . "<br>";
    }
}

$gv1 = new GiangVien("PH44354", "Trần Đức Khang", 2022, 1000000, 5);
$gv1->hienThiThongTin();
$gv2 = new GiangVien("PH34986", "Đình Thi", 2021, 5000000, 10);
$gv2->hienThiThongTin();
$gv3 = new GiangVien("PH31731", "Đỗ Đăng Khoa", 2023, 10000000, 25);
$gv3->hienThiThongTin();