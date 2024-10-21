<?php
session_start();
if (isset($_SESSION["giohang"]))  $_SESSION["giohang"]=[];
if(isset($_POST['addcart'])&&($_POST['addcart'])){
    $hinh=$_POST['hinh'];
    $ten=$_POST['tensp'];
    $gia=$_POST['gia'];
    $soluong=$_POST['soluong'];
    $sp =[$hinh,$ten,$gia,$soluong];
    $_SESSION['giohang'][]=$sp;
   
}
// Hàm hiển thị các sản phẩm trong giỏ hàng
function showgiohang() {
    
    if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
       for($i=0;$i<sizeof($_SESSION['giohang']);$i++) {
        echo '<div class="cart-item">';
        echo $i+1;
            echo ' <img src="' .$_SESSION['giohang'][$i][0]. '" alt=""><br>';
            echo 'Tên sản phẩm: ' . htmlspecialchars($_SESSION['giohang'][$i][1]) . '<br>';
            echo 'Giá: $' . $_SESSION['giohang'][$i][2] . '<br>';
            echo 'Số lượng: ' .$_SESSION['giohang'][$i][3] . '<br><br>';
            echo "Tổng:". $_SESSION['giohang'][$i][3]*$_SESSION['giohang'][$i][2];
            echo '</div>';
        }
    } else {
        echo "Giỏ hàng của bạn đang trống.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
    <link rel="stylesheet" href="giohang.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
</head>
<body>
    <h1>Giỏ hàng của bạn</h1>
    <?php showgiohang(); ?>
    <form action="" method="post">
        <input type="text" name="namepr" id="" placeholder="Tên Người Nhận">
        <input type="text" name="phone" id="" placeholder="số điện thoại người nhận">
        <input type="text" name="address" placeholder="địa chỉ người nhận">
    <button type="submit"> Mua Hàng</button>
    </form>
    <a href="aowebdautay.html">Tiếp tục mua sắm</a>
</body>
</html>
