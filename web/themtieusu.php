<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chucnang.css">
    <script src="js/ckeditor/ckeditor.js"></script>
    <title>Thêm Thông Tin</title>
</head>
<body>

<div id="form_themtieusu">
<center>
<h3>Thêm Dữ Liệu </h3>

<form action=""  method="POST">
<table class="table" >
<tr>
   <th>Nhập mã idol:</th>
   <th> <input type="text" name="ididol" size="40" > </th>
</tr>
<tr>
<th>Chọn ảnh :</th>
  <th>  <input type="file" name="anh" size="40"> </th>

    </tr> 
   
    <tr>
<th>Nhập Tên idol:</th>
  <th>  <input type="text" name="ten" size="40"> </th>

    </tr> 
    <th>Nhập Mô tả:</th>
  <th>  <input type="text" name="mota" size="40"> </th>

    </tr> 
    
 
    <tr>
<th>Nhập Ngày đăng:</th>
  <th>  <input type="date" name="ngaydang" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Mã Quốc Gia:</th>
  <th>  <input type="text" name="idquocgia" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Thông tin:</th>
  <th> 
      <textarea name="ttidol" id="ttidol" rows="10" cols="80">
      </textarea>
      <script>
           CKEDITOR.replace('ttidol');
      </script>
  </th>

    </tr> 
 </table>
    
    <button >Thêm</button>
    <button type="reset">Làm mới</button>
    <button ><a href="home.php" style="text-decoration: none; color:#000;">Thoát</a></button>
    
</form>
    <?php
    $link= mysqli_connect('localhost','root','','celeb') or die("Không thể kết nối được với database");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     if(isset($_POST['ididol'])) {$a=$_POST['ididol'];}
     if(isset($_POST['anh'])) {$b=$_POST['anh'];}
     
     if(isset($_POST['ten'])) {$c=$_POST['ten'];}
     if(isset($_POST['mota'])) {$d=$_POST['mota'];}
     if(isset($_POST['ttidol'])) {$e=$_POST['ttidol'];}
   
     if(isset($_POST['ngaydang'])) {$f=$_POST['ngaydang'];}
     if(isset($_POST['idquocgia'])) {$g=$_POST['idquocgia'];}
    
    $query="INSERT INTO thongtin VALUES('$a','$b','$c','$d','$e','$f','$g')";
    
    if ($link->query($query) == TRUE) {
        ?>
        <script>
        alert("Thêm Dữ liệu Thành Công");
        </script>
        <?php
    } else {
        ?>
        <script>
        alert("Thêm Dữ liệu Thất Bại");
        </script>
        <?php
    }
}
    $query2="SELECT * FROM thongtin";
    $ketqua=mysqli_query($link,$query2);
    $hang=mysqli_fetch_assoc($ketqua);
    
    ?>
    <table class="table_show" border="1" width="1080" align="center" cellpadding="1" cellspacing="1">
    <tr >
    <th class="table_show">Mã Idol</th>
    <th class="table_show">Anh</th>
    <th class="table_show">Tên Idol</th>
    <th class="table_show">Mô tả</th>
    <th class="table_show">Thông tin</th>
    <th class="table_show">Ngày đăng</th>
    <th class="table_show">Mã quốc gia</th>
    <th class="table_show">Sửa</th>
    <th class="table_show">Xóa</th>
    </tr>
    <?php do{  ?>
    <tr >
    <th class="table_show"> <?php echo $hang['ididol'] ?> </th>
    <th class="table_show"><?php echo $hang['anh']?>  </th> 
    <th class="table_show"> <?php echo $hang['ten'] ?> </th>
    <th class="table_show"> <?php echo $hang['mota'] ?> </th> 
    <th class="table_show"> <?php echo $hang['ttidol'] ?> </th>
    <th class="table_show"> <?php echo $hang['ngaydang'] ?> </th> 
    <th class="table_show"> <?php echo $hang['idquocgia'] ?> </th>
    <th > <a href="sua.php?ididol=<?php echo $hang['ididol'] ?>">Sửa</a> </th> 
    <th > <a href="xoa.php?ididol=<?php echo $hang['ididol'] ?>">Xóa</a> </th> 
    </tr>
    <?php 
    } while($hang=mysqli_fetch_assoc($ketqua));

    $link->close();
    ?>
    </table>
</center>
</div>


</body>
</html>