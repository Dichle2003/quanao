<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h2>Ivymoda Kính Chào Quý Khách</h2>
        <form action="" method="post">
            <div class="usps">
            <p>Username</p>
            <input type="text" name="username" id="" value="<?php
                 if(isset($_POST['username']))
                 echo $_POST['username']
            ?>" >
            </div>
            <div class="usps">
            <p>Password</p>
            <input type="password" name="password" id=""/>
            </div>
            <div class="btn_sb_rs">
            <button type="submit" class="btn btn-success">LOGIN</button>
            <button type="reset" class="btn btn-danger">RESET</button>
            </div>
            <br>
            <br>
            <a href="">Quên Mật Khẩu ?</a>
            <br>
            <br>
            <a href="http://localhost:8090/websitedautay/rigiter.php">Tạo Tài Khoản</a>
        </form>
        <?php
        require_once('ketnoi.php');
    

        
         if(isset($_POST['username'])&&isset($_POST['password'])){
            $name=$_POST['username'];
            $pass=$_POST['password'];
            $sql= " SELECT * FROM regeter WHERE tk='$name'&&mk='$pass' ";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                header("Location:website.html");
            }
            else if($name==null||$pass==null){
                echo"vui lòng nhập đủ thông tin";
            }
            else
                echo " sai mật khẩu hoặc tài khoản";   
            }
        
        ?>
    </header>
</body>
</html>