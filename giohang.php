<?php
session_start();
require_once("ketnoi.php");



if (!isset($_SESSION["giohang"]))  $_SESSION["giohang"] = [];

// Xử lý khi người dùng nhấn nút "Mua hàng"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['namepr']) && isset($_POST['phone']) && isset($_POST['address'])) {
    $name = $conn->real_escape_string($_POST['namepr']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    // Chèn thông tin từng sản phẩm vào bảng "orders"
    foreach ($_SESSION['giohang'] as $sp) {
        $product_name = $conn->real_escape_string($sp[1]);
        $product_price = $sp[2];
        $product_quantity = $sp[3];
        
        $sql_order = "INSERT INTO shop_dp (namepr, phone, addres, product_name, product_price, product_quantity) 
                      VALUES ('$name', '$phone', '$address', '$product_name', '$product_price', '$product_quantity')";
                    mysqli_query($conn, $sql_order);
    }

    // Xóa giỏ hàng sau khi hoàn tất mua hàng
    $_SESSION['giohang'] = [];
    echo "Đơn hàng của bạn đã được ghi nhận.";
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_POST['delcart']) && ($_POST['delcart'])) {
    $id = $_POST['id'];
    if (isset($_SESSION['giohang'][$id])) {
        unset($_SESSION['giohang'][$id]);
        $_SESSION['giohang'] = array_values($_SESSION['giohang']); // Cập nhật lại chỉ số mảng
    }
}

// Hàm hiển thị các sản phẩm trong giỏ hàng
function showgiohang() {
    if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            echo '<div class="cart-item">';
            echo $i + 1;
            echo ' <img src="' . $_SESSION['giohang'][$i][0] . '" alt=""><br>';
            echo 'Tên sản phẩm: ' . htmlspecialchars($_SESSION['giohang'][$i][1]) . '<br>';
            echo 'Giá: $' . $_SESSION['giohang'][$i][2] . '<br>';
            echo 'Số lượng: ' . $_SESSION['giohang'][$i][3] . '<br>';
            echo 'Tổng: ' . $_SESSION['giohang'][$i][3] * $_SESSION['giohang'][$i][2] . '<br>';

            // Nút xóa sản phẩm
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value="' . $i . '">';
            echo '<button type="submit" name="delcart" value="1">Xóa</button>';
            echo '</form>';

            echo '</div><br>';
        }
    } else {
        echo "Giỏ hàng của bạn đang trống.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="giohang.css">
</head>
<body>
    <h1>Giỏ hàng của bạn</h1>
    <?php showgiohang(); ?>
    <form action="" method="post">
        <input type="text" name="namepr" placeholder="Tên Người Nhận">
        <input type="text" name="phone" placeholder="Số điện thoại người nhận">
        <input type="text" name="address" placeholder="Địa chỉ người nhận">
        <button type="submit">Mua Hàng</button>
    </form>
    <a href="aowebdautay.html">Tiếp tục mua sắm</a>
</body>
</html>
