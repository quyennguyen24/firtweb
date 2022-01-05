<?php
 $link = mysqli_connect ('localhost', 'root', '', 'celeb') or die ("Ko the ket noi Database");

 if($link){
     mysqli_query($link,"SET NAMES'utf8");
     
}else{
    echo"ket noi fail".mysqli_connect_errno();
}
 ?>
