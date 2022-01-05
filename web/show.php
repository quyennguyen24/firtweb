<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/show.css">  
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
                        <a href="home.php"> <span class="fas fa-home"></span> Home</a>
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
                            
					<li><a href="login.php">Thêm Idol</a></li>
					<li><a href="login.php">Đăng Nhập</a></li>
                    <li ><a href="#">/</a></li>
                    <li><a href="dangky.php">Đăng Ký</a></li>

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
    
    <div class="container">
     


	<main>
	<div class="container mt-5">
           <div class="row">
            <div class="col-md-8">
			<?php 
						
				$link = mysqli_connect ('localhost', 'root', '', 'celeb') or die ("Ko the ket noi Database");
				$a = $_GET['ididol'];
				$sql = "SELECT * FROM thongtin where ididol= $a";
					if($result = mysqli_query($link,$sql)){
						$detail=mysqli_fetch_array($result);
						do{
							echo '				
                                <div class="mota" style="color:black;"><font size="7">
                                '.$detail['mota'].'</font>
                                </div>
                                <div class="ngaydang">
                                Ngày đăng tải:
                                '.$detail['ngaydang'].'
                                </div>
								<div class="ttidol">
									'.$detail['ttidol'].'
								</div>	

									';
						}while($detail=mysqli_fetch_assoc($result));
					}else{
						echo '<h2>lỗi</h2>';
					}
						
			?>
               
            </div>
            <div class="col-md-4">
                <h4   style="color: black;  ">Có Thể Bạn Quan Tâm</h4>
                <hr  style="margin-left:40px;  border: 4px solid black;border-radius: 5px;" width="300">

                <ul class="menu">
				<?php 
						
						$link = mysqli_connect ('localhost', 'root', '', 'celeb') or die ("Ko the ket noi Database");
						$sql = "SELECT * FROM thongtin where ididol not in( $a) group by idquocgia desc limit 4";
						if($result = mysqli_query($link,$sql)){
							$detail=mysqli_fetch_array($result);
									do{
										echo '
										<li class="menu-item mb-2">
											<a href="show.php?ididol='.$detail['ididol'].'" class="menu-link" style="text-decoration: none ">
												<div class="anh" >
													<img src="img/'.$detail['anh'].'"width="100%" height="150" alt="">
												</div>
												
												<div class="ten"  style="text-align:center;color:rgb(161, 45, 64);"><b><font size="3">
													'.$detail['ten'].'</font></b>
												</div>
                                                <div class="mota" style="text-decoration: none; color:#000;"><b>
															'.$detail['mota'].'</b>
												</div>
													
												
											</a>
										</li>
											';
									}while($detail=mysqli_fetch_assoc($result));
						}else{
							echo '<h2>lỗi</h2>';
						}
						
						?>
                </ul>
            </div>
           </div>
        </div>
	</main>
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
							Email: nhuquyen6426@gmail.com<br>
                            This Website was create by Nguyen Nhu Quyen :))
						</div>
                        
                </div>
                </center>
        </div>
        </div>
                
    </footer>

    

</body>
</html>