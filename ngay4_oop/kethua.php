<?php

// Tính kế thừa trong OOP
// Một class kế thừa từ class cha của nó thì có thể sử dụng các thuộc tính
// và phương thức của class cha

// Demo tính kế thừa
class ConNguoi {
    public $name;
    public $age;
    public $gender;
    public $hands;
    public $foots;

    public function setHands($hands)
    {
        $this->hands = $hands;
    }

    public function setFoots($foots)
    {
        $this->foots = $foots;
    }

    public function action()
    {
        echo "<h1>Ăn bằng mồm</h1>";
        echo "<br>";
    }
}

class TreCon extends ConNguoi
{
    public function cow()
    {
        echo "<h1>Trẻ con bò bằng $this->hands tay và $this->foots chân</h1>";
        echo "<br>";
    }
}

$treCon = new TreCon();
$treCon->action();

$treCon->setHands(2);
$treCon->setFoots(2);

$treCon->cow();

class NguoiLon extends ConNguoi
{
    public $nguoiYeu;
    public function go()
    {
        echo "Người lớn đi bằng $this->foots chân";
        echo "<br>";
    }
}

$nguoiLon = new NguoiLon();

$nguoiLon->setFoots(2);

$nguoiLon->go();

// Phạm vi truy cập
// Public
// Private
// Protected

class TruyCap {
    public $public = "Có thể truy cập ở bất kì đâu";
    private $private = "Chỉ có thể truy cập ở bên trong class";
    protected $protected = "Chỉ có thể truy cập bên trong class 
                            và các class kế thừa";

    public function getPrivate()
    {
        return $this->private;
    }
}

$phamViTruyCap = new TruyCap();
echo $phamViTruyCap->public;
echo "<br>";
echo $phamViTruyCap->getPrivate();
echo "<br>";

class TruyCap_0 extends TruyCap
{
    public function getProtected()
    {
        return $this->protected;
    }
}

$phamViTruyCap0 = new TruyCap_0();
echo $phamViTruyCap0->getProtected();
echo "<br>";
