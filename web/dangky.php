<html>
<head>
<title>Đăng ký</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body background="img/jsoo.jpg">
<div class="container-fluid bg" style=" padding-top: 200px;">
<center>
<div class="row justify-content-center" style="border-radius:12px; background-color:rgb(240, 240, 240); border: 2;  width:400;height:250;padding-top:50px" >
<div class="col-md-4">
<form action="" method="POST">
<b><font size="5" color="red">Đăng Ký</font></b>

<div class="form-group">
    <input type="text" name="ten"  maxlength="30" placeholder="Tên Đăng Nhập" class="form-control"><br><br>
    <input type="password" name="mk" maxlength="30" placeholder="Mật Khẩu" class="form-control">
</div><br><br>

  <button class="btn" type="submit" name="dangky">Đăng ký</button>
               
   <button class="btn" type="reset">Làm mới</button>
  
</form>
</div>
</div>
</center>
</div>
<?php

$link= mysqli_connect('localhost','root','','celeb') or die("Không thể kết nối được với database");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	if(isset($_POST['ten'])) $a=$_POST['ten'];
	if(isset($_POST['mk']))  $b=$_POST['mk'];
	$luachon = "INSERT INTO acc (matkhau,tenhienthi) VALUES ('$b', '$a')";
	
	if ($link->query($luachon) == TRUE) {
		?>
		<script>
			alert("đăng ký thành công");
		<?php header("location:login.php");?>
		</script>
		<?php
		
        
    } else {
		?>
    <script>
    alert("đăng ký thất bại");
    
    </script>
    
    <?php
}
}

?>
        


</body>
</html>