<?php
// Trừu tượng là gì?
// Cái gì mà không cụ thể hóa được thì ta phải trừu tượng nó lên

// Lớp trừu tượng được khai báo bằng từ khóa abstract phía trước từ khóa class

abstract class Crush {
    // Một số đặc điểm cơ bản

    // Một class trừu tượng sẽ chứa những phương thức trừu tượng
    abstract public function thichToi();
    // Phương thức trừu tượng chỉ được phép khai báo trong lớp trừu tượng
    // và không có nội dung
    // Nếu không phải là phương thức trừu tượng thì vẫn triển khai như bình thường

    public $hoTen; // Thuộc tính bình thường
    // abstract public $hoTen; // LỖI -> Chỉ có phương thức trừu tượng, không có thuộc tính trừu tượng.

    // Các phạm vi truy cập trong lớp trừu tượng chỉ được khai báo là public và protected
}
// Không thể khởi tạo đối tượng từ class trừu tượng
// $newCrs = new Crush(); // LỖI

class NYC extends Crush {
    public function thichToi()
    {
        echo "Đã từng thích tôi";
    }
}
$nYC1 = new NYC();
$nYC1->thichToi();