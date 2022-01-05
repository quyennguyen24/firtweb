<html>
<head>
<link rel="stylesheet" href="css/login.css">
</head>
<body background="img/lisa.jpg "  > 

<div class="container-fluid bg" style=" padding-top: 200px;">
<center>
<div class="row justify-content-center" style="border-radius:12px; background-color:rgb(240, 240, 240); border: 2;  width:400;height:250;padding-top:50px" >
<div class="col-md-4">
<form action="" method="POST">
<b><font size="5" color="red">LOGIN</font></b>

<div class="form-group">
    <input type="text" name="ten"  maxlength="30" placeholder="Tên Đăng Nhập" class="form-control"><br><br>
    <input type="password" name="mk" maxlength="30" placeholder="Mật Khẩu" class="form-control">
</div><br><br>

  <button class="btn" type="submit" name="dangnhap">Đăng nhập</button>          
   <button class="btn" type="reset">Làm mới</button>
   
  
</form>
</div>
</div>
</center>
</div>

<?php
$link= mysqli_connect('localhost','root','','celeb') or die("Không thể kết nối được với database");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['ten'])) {$a=$_POST['ten'];}
if(isset($_POST['mk'])) {$b=$_POST['mk'];}
if($a==""||$b==""){
    echo $my_var ="<script class='error'>alert(' Tài khoản mật khẩu không được để trống!')</script>";
}

$luachon = "SELECT * FROM acc";
$ketqua = mysqli_query($link, $luachon);
$hang = mysqli_fetch_assoc($ketqua);
if($ketqua = mysqli_query($link,$luachon)){
    $e = 0;
    while($hang = mysqli_fetch_array($ketqua)){
        if($hang['tenhienthi']==$a && $hang['matkhau']==$b){
            header("location:themtieusu.php");
            $e++;
            exit;
          }
        }
    }
    if($e==0){
        echo("đăng nhập thất bại");
    }
}else
    echo 'ket noi that bai' . mysqli_error($link);
    mysqli_close($link);

?>

</body>
</html>