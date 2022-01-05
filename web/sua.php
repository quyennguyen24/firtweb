<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chucnang.css">
    <script src="js/ckeditor/ckeditor.js"></script>
    <title>Sửa</title>
</head>
<body>
<?php
$link= mysqli_connect('localhost','root','','celeb') or die("Không thể kết nối được với database");
if(isset($_GET["ididol"])){
$ididol=$_GET["ididol"];}
$query = "SELECT * from thongtin WHERE ididol='$ididol'";
$ketqua=mysqli_query($link,$query);
$hang=mysqli_fetch_assoc($ketqua);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['ididol'])) {$a=$_POST['ididol'];}
    if(isset($_POST['anh'])) {$b=$_POST['anh'];}
    if(isset($_POST['ten'])) {$c=$_POST['ten'];}
    if(isset($_POST['mota'])) {$d=$_POST['mota'];}
    if(isset($_POST['ttidol'])) {$e=$_POST['ttidol'];}
    if(isset($_POST['ngaydang'])) {$f=$_POST['ngaydang'];}
    if(isset($_POST['idquocgia'])) {$g=$_POST['idquocgia'];}
   
   $query2="UPDATE thongtin SET anh='$b' ,ten='$c',mota='$d',ttidol='$e',ngaydang='$f',idquocgia='$g' WHERE ididol='$a'";
  
   if ($link->query($query2) == TRUE) {
       ?>
       <script>
      var r= confirm("Sửa Dữ liệu Thành Công! Bạn muốn quay trở về không");
       if(r==true)
       {
           <?php header("location: themtieusu.php");?>
       }
       </script>
       <?php
        
   } else {
       ?>
       <script>
       var r= confirm("Sửa Dữ liệu Thất Bại! Bạn muốn quay trở về không");
       if(r==true)
       {
           <?php header("location: themtieusu.php");?>
       }
       </script>
       <?php
       
   }
  

}
?>
<div id="form_themtieusu">
<center>
<h3>Thêm Dữ Liệu Cho IDOL</h3>

<form action=""  method="POST">
<table>
<tr>
   <th>Nhập mã Idol:</th>
   <th> <input type="text" name="ididol" size="40" value="<?php echo $hang['ididol']?>" > </th>
</tr>
<tr>
<th>Chọn ảnh :</th>
  <th>  <input type="file" name="anh" size="40" value="<?php echo $hang['anh']?>"> </th>

    </tr> 

    <tr>
<th>Nhập Tên:</th>
  <th>  <input type="text" name="ten" size="40" value="<?php echo $hang['ten']?>"> </th>

    </tr> 
    <th>Nhập Mô Tả:</th>
  <th>  <input type="text" name="mota" size="40" value="<?php echo $hang['mota']?>"> </th>

    </tr> 
    

    <tr>
<th>Nhập Ngày Đăng:</th>
  <th>  <input type="date" name="ngaydang" size="40" value="<?php echo $hang['ngaydang']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Mã Quốc Gia:</th>
  <th>  <input type="text" name="idquocgia" size="40" value="<?php echo $hang['idquocgia']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Thông Tin:</th>
  <th> 
      <textarea name="ttidol" id="ttidol" rows="10" cols="80">
      </textarea>
      <script>
           CKEDITOR.replace('ttidol');
      </script>
  </th>

    </tr> 
 </table>
    <button>Sửa</button>

</form>
    
   
</center>
</div>


</body>
</html>