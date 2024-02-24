<?php
// Interface không phải là một class
// Interface là một khuôn mẫu sử dụng để tạo ra bộ khung cho các class
// Interface giống như một bản hợp đồng ràng buộc
// bắt buộc lớp kế thừa phải có đầy đủ các phương thức trong bản hợp đồng đó
interface DiChuyen
{
    // MỘT SỐ ĐẶC ĐIỂM

    // 1. Không được phép khai báo thuộc tính
//    public $hoTen;

    // Trong interface chỉ được khai báo phương thức
    // và không được phép triển khai nội dung trong phương thức

    // Phạm vi truy cập trong interface chỉ có public.
}
// Không thể khởi tạo đối tượng từ interface
// $test = new DiChuyen(); LỖI

// Để sử dụng interface, tà cần định nghĩa 1 class
// và implements từ interface đó
class ConCho implements DiChuyen
{
    // Các lớp được implements từ interface
    // phải định nghĩa tất cả phương thức từ interface đó
    // Không thể thay đổi phạm vi truy cập sang private và protected
    public function go()
    {
        echo "Con chó đi bằng 4 chân";
    }
}

interface go0
{
    public function go0();
}


// Một class có thể implements nhiều interface
class Oto implements DiChuyen, go0
{
    public function go()
    {
        echo "Đi bằng 4 bánh";
    }

    public function go0()
    {
        echo "Đi bằng 6 bánh";
    }
}

// Các interface có thể kế thừa lẫn nhau
interface go3 extends DiChuyen, go0
{
    public function go3();
}

// Khi nào cần sử dụng interface và abstract class?

// 1. DÙng abstract class khi
// - Chia sẻ phương thức và thuộc tính giữa các class
// - Nếu muốn class này chứa những thành phần protected
// ==> Khi chúng ta xác định có sử dụng kế thừa để chia sẻ dữ liệu
// và các lớp có mối liên hệ với nhau.

// 2. DÙng interface khi:
// - Khi sử dụng đa kế thừa
// - Định nghĩa các phương thức chung cho class
// (không cần mối liên hệ với nhau).