<?php

class HKBank {
    protected $soTK;
    protected $tenTK;
    protected $soDu;

    public function __construct($soTK, $tenTK, $soDu)
    {
        $this->soTK = $soTK;
        $this->tenTK = $tenTK;
        $this->soDu = $soDu;
    }

    public function hienThiTK()
    {
        echo "Số tài khoản: " . $this->soTK . "<br>";
        echo "Tên tài khoản: " . $this->tenTK . "<br>";
        echo "Số tiền: " . $this->soDu . "<br>";
    }

    public function napTien($soTien)
    {
        if($soTien > 0) {
            $this->soDu += $soTien;
            echo "Nạp thành công, số dư hiện tại là: " . $soTien . "<br>";
        } else {
            echo "Số tiền bạn nhập vào không hợp lệ. <br>";
        }
    }

    public function rutTien($soTien)
    {
        if($soTien > 0 && $soTien <= $this->soDu) {
            $this->soDu -= $soTien;
            echo "Rút thành công, số dư hiện tại là: " . $soTien . "<br>";
        } else {
            echo "Số tiền bạn nhập vào không hợp lệ. <br>";
        }
    }
}