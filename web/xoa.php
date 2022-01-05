<?php
$link= mysqli_connect('localhost','root','','celeb') or die("Không thể kết nối được với database");
if(isset($_GET["ididol"])){
  $ididol=$_GET["ididol"];
}
$query = "DELETE FROM thongtin WHERE ididol='$ididol'";
$ketqua=mysqli_query($link,$query);
header("location: themtieusu.php");
?>
