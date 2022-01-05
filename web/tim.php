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
    <center><img src="img/tonghop.jpg" width="100%" height="400">  </center> 
</div>



<div class="menu">
<nav class="navbar navbar-inverse bg-primary">
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
                        <li class="active">
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
    </div>
<div class="container">
   
    
<?php 
                 $link = mysqli_connect ('localhost', 'root', '', 'celeb') or die ("Ko the ket noi Database");
                    if ($_SERVER["REQUEST_METHOD"] == "POST") { //Lấy giá trị POST từ form vừa submit
                    if(isset($_POST["tukhoa"])) { $a = $_POST['tukhoa']; };
                    echo '
                        <div class="Post_Search">
                        <h2>Từ bạn tìm kiếm là: '.$a .' </h2>
                        </div>
                        <div class="row">  
                    ';
                    //Code xử lý, 
                        $sql = "SELECT * FROM thongtin WHERE ten like '%$a%'";
                    if($result = mysqli_query($link,$sql)){
                        $detail=mysqli_fetch_array($result);
                        if($detail>0){
                                do{
                                    echo '
									<div class="list-item col-md-3 col-6 mt-2">
										<a href="show.php?ididol='.$detail['ididol'].'" class="list-item-link" >
											<div class="item-img">
												<img src="img/'.$detail['anh'].'" width="100%" height="150" alt="">
											</div>
											<div class="item-title">
											'.$detail['ten'].'
											</div>
										</a>
									</div>
                                    ';
                                }while($detail=mysqli_fetch_assoc($result));
                            }else{
                                echo '<h2>Không tìm thấy nội dung này</h2>';
                            }
                        }else{
                            echo '<h2>Không tìm thấy nội dung này</h2>';
                        }
                        echo'</div>';
                    }
        
        ?>
</div>


    

</body>
</html>