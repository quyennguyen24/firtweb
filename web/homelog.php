<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylle.css">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   
    <title>Idol</title>
</head>
<script src="js/Jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
<body >
<div class="logo">
    <center>
    <img src="img/logo.png" width="200" height="120"></center> 
</div>



<div class="menu">

<nav class="navbar navbar-inverse bg-primary" style="  background-color: #000011;border-color: #CCFFCC;">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">    
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
    </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li >
                        <a href="homelog.php"> <span class="fas fa-home"></span> Home</a>
                        </li>
						
						
						<?php 
                            
                            $link = mysqli_connect ('localhost', 'root', '', 'celeb') or die ("Ko the ket noi Database");
                            $sql = "SELECT * FROM maquocgia";
                            
                            if($result = mysqli_query($link,$sql)){
                                $detail=mysqli_fetch_array($result);

                                    do{?>
                                    
                                        <li class="nav-item">
                                        <a class="nav-link" href="lietke.php?maquocgia=<?php echo $detail  ['maquocgia']?>"><?php echo $detail['tenquocgia']?></a>
                                        </li>
                                    
                                <?php  }while($detail=mysqli_fetch_assoc($result));} ?>
                            
					<li><a href="themtieusu.php">Thêm Idol</a></li>
					<li><a href="home.php">Đăng xuất</a></li>
                    

                    </ul>
					<form class="navbar-form navbar-right" role="search" action="tim.php" method="POST">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" name="tukhoa">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div>
 </nav>

</div>

    <div class="container">
    <div class="slide">
    <div id="idol" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#idol" data-slide-to="1" class="active"></li>
                        <li data-target="#idol" data-slide-to="2"></li>
                        <li data-target="#idol" data-slide-to="3"></li>
                        <li data-target="#idol" data-slide-to="4"></li>
                        <li data-target="#idol" data-slide-to="5"></li>
                        <li data-target="#idol" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/mtp.jpg" width="100%"   alt="1">
                        </div>
                        <div class="item">
                            <img src="img/jisoo.jpg"  width="100%" alt="2">
                        </div>
                        <div class="item">
                            <img src="img/therock.webp" width="100%"  alt="3">
                        </div>
                        <div class="item">
                            <img src="img/trieuledinh.jpg" width="100%"  alt="4">
                        </div>
                        <div class="item">
                            <img src="img/taylor-swift-2.jpg" width="100%"  alt="5">
                        </div>
                        <div class="item">
                            <img src="img/den.jpg" width="100%"  alt="6">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#idol" role="button" data-slide="prev">
                        <span class=" chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#idol" role="button" data-slide="next">
                        <span class=" chevron-right "></span>
                    </a>
                </div>
    </div>   
	<section>
		<div class="container section ">
			<?php 
						/* in ra thẻ li */
				$link = mysqli_connect ('localhost', 'root', '', 'celeb') or die ("Ko the ket noi Database");
				$sql = "SELECT * FROM maquocgia";
				if($result = mysqli_query($link,$sql)){
					$detail=mysqli_fetch_array($result);
						do{
							echo '
							<div class="section-item mt-3">
                            <h4 style="color:black;size:100px;">Thông tin người nổi tiếng '.$detail['tenquocgia'].'</h4>
                            <hr style="margin-left:0px;  border: 4px solid black;border-radius: 5px;" width="300">
                                <div class="row">
							';
									$a = $detail['maquocgia'];
									$sql2 = "SELECT * FROM thongtin where idquocgia= $a limit 4";
									if($result2 = mysqli_query($link,$sql2)){
										$detail2=mysqli_fetch_array($result2);
											do{
												echo '
												
													<div class="list-item col-md-3 col-6 mt-2">
														<a href="show.php?ididol='.$detail2['ididol'].'" class="list-item-link" >
															<div class="img" style="border-radius: 12px;">
																<img src="img/'.$detail2['anh'].'" width="100%" height="150" alt="">
															</div>
															<div class="ten" style=" text-align: center;text-decoration: none; color:rgb(161, 45, 64);;"><b><font size="3">
															'.$detail2['ten'].'</font></b>
															</div>
                                                            <div class="mota" style="text-decoration: none; color:#000;"><b>
															'.$detail2['mota'].'</b>
															</div>
														</a>
													</div>
												
												';
												}while($detail2=mysqli_fetch_assoc($result2));
										}else{
										echo '<h2>lỗi</h2>';
									}

							echo '</div></div>';
						}while($detail=mysqli_fetch_assoc($result));
					}else{
					echo '<h2>lỗi</h2>';
				}
						
			?>
		</div>
	</section>
    </div>
    <footer >
    <div class="thanhcc">
            <ul>
                <center><li><a style="text-decoration: none; color:white;" href="#"><b><font size="3">Đầu trang</font></b></a></li></center>
            </ul>
        </div>
        <div class="container pt-2">
        <div class="row">
        
                <center>
                 <div class="anh1" class="col-md-2">
                        <img src="img/logofooter.png" width="200" height="100">
                 </div>
                <div class="tt" style=" margin-bottom: 10px;">
                        <h4>Thông tin về chúng tôi</h4>
                        
						<div>
							Địa chỉ: 3 Lê Trọng Tấn, Khương Mai, Thanh Xuân, Hà Nội 100000, Việt Nam
						</div>
						<div>
							Hotline: 0987130090
						</div>
                        <div>
                        <a style="text-decoration: none; color:white;" href="https://www.facebook.com/profile.php?id=100024541806774">
                        <b><font size="3"><i class="fab fa-facebook-square"></i>&ensp; Facebook</font></b></a>
                        </div>
						<div>
							Email: nhuquyen6426@gmail.com <br>
                            This Website was create by Nguyen Nhu Quyen :))
						</div>
                        
                </div>
                </center>
        </div>
        </div>
                
    </footer>

    

</body>
</html>