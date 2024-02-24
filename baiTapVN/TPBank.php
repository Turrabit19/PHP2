<?php

class TPBank extends HKBank {
    private $hoTen;
    private $ngaySinh;

    public function __construct($soTK, $tenTK, $soDu, $hoTen, $ngaySinh)
    {
        parent::__construct($soTK, $tenTK, $soDu);
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
    }

    public function guiTietKiem($soTien)
    {
        $soTien = $this->soDu * 0.06;
        $this->soDu += $soTien;
        echo "Số tiền sau gửi tiết kiệm là: " . $this->soDu . "<br>";
    }

    public function chuyenTien($soTien, $nguoiNhan)
    {
        if ($soTien > 0 && $soTien <= $this->soDu) {
            $this->soDu -= $soTien;
            $nguoiNhan->soDu += $soTien;
            echo "Bạn vừa chuyển thành công số tiền $soTien VNĐ <br>";
            echo "đến người nhận $nguoiNhan->tenTK, stk là $nguoiNhan->soTK <br>";
            echo "Số dư trong tài khoản là: $this->soDu";
        } else {
            echo "Số dư trong tài khoản không đủ để giao dịch";
        }
    }
}