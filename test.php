<?php // Lớp Động Vật
class DongVat
{
    // Thuộc tính
    var $mat = '';
    var $mui = '';
  
    // Phương Thức
    function an()
    {
        echo 'Dong Vat Dang An';
    }
}
  
// Lớp Con Trâu
class ConTrau extends DongVat
{
    function an(){
        echo "meo cho an";
    }
    function gioi_thieu()
    {
        $this->mat = 'Đây là cái mặt';
        $this->mui = 'Đây là cái mũi';
        parent::an(); // xuất ra chuỗi "Động Vật Đang Ăn"
    }
}
  
// Chương Trình
$contrau = new ConTrau();
  
// Gọi đến hàm gioi_thieu trong lớp Con Trâu
// nên xuất ra màn hình chuỗi "Động Vật Đang Ăn"
$contrau->gioi_thieu();
  
// Trong hàm giới thiệu có gán giá trị cho 2
// thuộc tính mắt và mũi, giờ ta xuất ra màn hình
// xem giá trị nó là gì
echo "/n";
echo $contrau->mat;
echo $contrau->mui;
?>