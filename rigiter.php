<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="regeter.css">
   
</head>
<body>
    <header>
        
<form action="" method="post">
        <h1>Đăng kí IVYMODA tại đây</h1>
        <div class="content">
                <p>Tên tài khoản</p>
                <input type="text" name="tk" id="" value="">
            </div>
            <div class="content">
                <p>Tên đăng nhập</p>
                <input type="text" name="dn" id="">
            </div>
            <div class="content">
                <p>Email</p>
                <input type="text" name="email" id="">
            </div>
            <div class="content">
                <p>phone</p>
                <input type="text" name="phone" id="">
            </div>
            <div class="content">
                <p>Địa chỉ</p>
                <input type="text" name="dc" id="">
            </div>
            <div class="content">
                <p>Mật khẩu</p>
                <input type="text" name="mk" id="">
            </div>
            <div class="content">
                <p>Nhập lại mật khẩu</p>
                <input type="text" name="lmk" id="">
            </div>
            <button type="submit" > Đăng Kí</button>
            <br>
            <br>
            <button> <a style="text-decoration: none; color:white;" href="http://localhost:8090/websitedautay/login.php"> Trở Lại Trang Đăng Nhập</a></button>
            <?php

           
             if(isset($_POST['tk'])&&isset($_POST['dn'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['dc'])&&isset($_POST['mk'])&&isset($_POST['lmk']))
            {
                
                
                require_once('ketnoi.php');
                $tk=$_POST['tk'];
                $dn=$_POST['dn'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $dc=$_POST['dc'];
                $mk=$_POST['mk'];
                $lmk=$_POST['lmk'];
               if($tk==null||$dn==null||$email==null||$phone==null||$dc==null||$mk==null||$lmk==null){
                echo "<script> alert('Vui lòng nhập đủ thông tin') </script>";

               }
               else
                {
            if($mk==$lmk){
                $xuat="SELECT * FROM regeter WHERE tk='$tk'";
                $result= mysqli_query($conn,$xuat);
                $them="INSERT INTO regeter(tk,dn,email,phone,dc,mk,lmk) value('$tk','$dn','$email','$phone','$dc','$mk','$lmk')";
                if(mysqli_num_rows($result)>0){
                    echo "<script> alert('Tên Tài khoản đã tồn tại') </script>";
                }
                else{
                if(mysqli_query($conn,$them))
                {
                    echo "<script> alert('Đăng Kí Thành Công') </script>";
                   
                }
                
                else{
                    echo "<script> alert('Đăng Kí Thất Bại!') </script>";
                }
            }
            }
            else
            echo "<script> alert('Mật Khẩu Phải Trùng Khớp') </script>";
        
          
        
            }
        }
            
            ?> 
            </form>
    </header>
</body>
</html>