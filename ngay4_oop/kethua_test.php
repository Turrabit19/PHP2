<?php

class ConNguoi {
    public $hoTen;
    public $diaChi;
    public $namSinh;
    public $email;
    public $sdt;

    public function __construct($hoTen, $diaChi, $namSinh, $email, $sdt)
    {
        $this->hoTen = $hoTen;
        $this->diaChi = $diaChi;
        $this->namSinh = $namSinh;
        $this->email = $email;
        $this->sdt = $sdt;
    }

    public function tinhTuoi()
    {
        $tuoi = DATE('Y') - $this->namSinh;
        return $tuoi;
    }

    public function xuatThongTin()
    {
        echo $this->hoTen . "<br>";
        echo $this->diaChi . "<br>";
        echo $this->namSinh . "<br>";
        echo $this->email . "<br>";
        echo $this->sdt . "<br>";
        echo $this->tinhTuoi() . "<br>";
    }
}

$human1 = new ConNguoi("Trần Đức Khang", "Nam Định", 2004, "tdkhangg2004@gmail.com", "0386596511");
$human1->xuatThongTin();

class HocSinh extends ConNguoi {
    public $diemToan;
    public $diemLy;
    public $diemHoa;

    public function __construct($hoTen, $diaChi, $namSinh, $email, $sdt, $diemToan, $diemLy, $diemHoa)
    {
        parent::__construct($hoTen, $diaChi, $namSinh, $email, $sdt);

        $this->diemToan = $diemToan;
        $this->diemLy = $diemLy;
        $this->diemHoa = $diemHoa;
    }

    public function diemTB()
    {
        $diemTB = ($this->diemToan + $this->diemLy + $this->diemHoa) / 3;
        return $diemTB;
    }

    public function xuatThongTin1()
    {
        echo "<br>";
        parent::xuatThongTin();
        echo "Điểm trung bình = " . $this->diemTB() . "<br>";
    }
}

$hocSinh1 = new HocSinh("Trần Đức Khang", "Nam Định", 2004, "tdkhangg2004@gmail.com", "0386596511", 8, 9, 10);
$hocSinh1->xuatThongTin1();

class GiangVien extends ConNguoi {
    public $luongCB;
    public $soGioDay;

    public function __construct($hoTen, $diaChi, $namSinh, $email, $sdt, $luongCB, $soGioDay)
    {
        parent::__construct($hoTen, $diaChi, $namSinh, $email, $sdt);

        $this->luongCB = $luongCB;
        $this->soGioDay = $soGioDay;
    }

    public function tinhTongLuong ()
    {
        $tongLuong = $this->luongCB * $this->soGioDay;
        return $tongLuong;
    }

    public function xuatThongTin2()
    {
        echo "<br>";
        parent::xuatThongTin();
        echo "Tổng lương = " . $this->tinhTongLuong();
    }
}

$giangVien1 = new GiangVien("Trần Đức Khang", "Nam Định", 2004, "tdkhangg2004@gmail.com", "0386596511", 7, 8);
$giangVien1->xuatThongTin2();