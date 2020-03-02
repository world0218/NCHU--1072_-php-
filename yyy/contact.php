<?php
session_start();
require_once 'config.php';
$data = $mysqli->query("SELECT * FROM class");
if($_SESSION['useraccount'] == null)
{
  echo "<script>alert('請重新登入'); location.href = 'login.php';</script>";
}else{
	$account = $_SESSION['useraccount'];
	$sqlcheck="SELECT * FROM newuser WHERE account = '$account'";
	if (!empty($result = $mysqli->query($sqlcheck))) {

		if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   //新版寫法
			$getid=$row['account'];
			$name = $row['name'];
			$password = $row['password'];
			$email = $row['email'];
			$phone = $row['phone'];
			//echo json_encode($row['id'] ,JSON_UNESCAPED_UNICODE);
			
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="image/favicon.ico">
	
    <title>
      聯絡我-松田寿司
     </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
	<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style>
	.mySlides {display:none;}
	</style>
  </head>
  <body>
    <style>
	#font{
		font-family:標楷體;
	}
	#nav{
		width:80%;
		margin-left:10%;
		}
	#navcontent {
		background:rgba(100%,100%,100%,0);
		height:100px;
		width:90%;
		float:left;
		margin-left:5%;
		}
	
	#container {
		width:100%;
		background-image: url("image/bk1.jpg");
		}
	#rcorners1 {
			font-family:標楷體;
			text-align:center;
			font-size:22px;
			background:-webkit-linear-gradient(top, #ffffff 0%,#f1f1f1 50%,#e1e1e1 85%,#f6f6f6 100%);
			border-radius: 0px 0px 20px 20px;
			border: 2px solid #73AD21;
			padding: 20px; 
			margin-left:15%;
			margin-top:-10px;
			width: 70%;
			height: 130px; 
			box-shadow: 0px 0px 20px grey;	
		}
	#nav ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}

	#nav li {
		float: left;
		width:100px;
	}

	#nav li a {
		display: inline;
		width: 5px;
	}

	#nav li a.active, #nav li a:hover {
		background:#eee;/*滑鼠滑入處變色*/
		color:#333;
		}
	#menu {
		background-image: url("image/bk1.jpg");
		height:700px;
		width:15%;
		float:left;
		}
	#content {
		background-image: url("image/bk1.jpg");
		height:700px;
		width:70%;
		float:left;
	}
	#rcorners3 {
			float:left;
			margin:50px 10px;
			font-family:標楷體;
			text-align:center;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			border-radius: 10px 10px;
			border: 2px solid #73AD21;
			padding: 0px; 
			width: 20%;
			height: 280px; 
			box-shadow: 0px 0px 10px grey;
		}
	.p-2 {
			padding-top: 1rem !important;
			padding-right: 0rem !important;
			padding-bottom: 1rem !important;
			padding-left: 0rem !important;
		}
	#rcorners4 {
			float:left;
			align-items: center;
			margin:10px 10px;
			font-family:標楷體;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			border-radius: 10px 10px;
			border: 2px solid #73AD21;
			padding: 0px; 
			width: 70%;
			height: 500px; 
			box-shadow: 0px 0px 10px grey;	
		}
	.p-4 {
			padding-top: 1rem !important;
			padding-right: 0rem !important;
			padding-bottom: 1rem !important;
			padding-left: 0rem !important;
		}
	#rcorners5 {
			float:left;
			margin:10px 10px;
			font-family:標楷體;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			border-radius: 10px 10px;
			border: 2px solid #73AD21;
			padding: 0px; 
			width: 95%;
			height: 350px; 
			box-shadow: 0px 0px 10px grey;	
		}
	#contact{
		float:left;
		width:90%;
		height:90%;
		
	}
	#menu2 {
		margin-left:0;
		height:60%;
		width:60%;
		float:left;
		font-size:18px;
	}
	#nav2 {
	margin:0;
	padding:0;
	list-style-type:none;
	width:180px;
	}

	#nav2 li a { 
	width:90%;
	margin-left:5%;
	text-decoration: none;
	display:block;/*設定為區塊*/
	border-bottom: 1px solid #632d00;
	}

	#nav2 li a.active, #nav2 li a:hover {
	background:#11ff00;/*滑鼠滑入處變色*/
	color:#333;
	}
	</style>
    <div id="container">
		<nav id="rcorners1" class="navbar navbar-expand-lg navbar-dark navbar-custom">
		</nav>
		<nav id="rcorners1" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
		<div id="navcontent">
		<h1 id="font">歡迎蒞臨松田壽司</h1>
			<nav id='nav'><ul class='bb'>
				<li><a href="index.php">首頁</a></li>
				<li><a href="intro.php">店鋪簡介</a></li>
				<li><a href="product.php">商品區</a></li>
				<li><a href="contact.php">聯絡我</a></li>
			</ul></nav>
			</div>
		</nav>
		
		<div id="menu" >
			
		</div>
		
		<div id="content">
			<div id="rcorners3">
				<div class="p-2">
					<div>
						<h2><?php echo $name;?>，您好</h2>
					</div>
					<div id="menu2" >
						<ul id="nav2">
						<li><a href="order.php">下訂單</a></li>
						<li><a href="ordersearch.php">訂單查詢</a></li>
						<br>
						</ul>
					</div>
					<div style="margin-bottom:10px ">
						<span><a class="btn btn-primary" href="update_Account.php" role="button">修改資料</a></span>
						<span><a class="btn btn-primary" href="login.php" role="button">登出</a></span>
					</div>
				</div>
			</div>
			
			<div class="p-4">
				<div id="rcorners4">
				
				<div id="contact">
					<span>
					<font style="padding-left:10px" size=6>
					<img src="image/phone.png" width="30px" height="10%">
					聯絡電話:0968881946
					<br>
					<img src="image/map.png" width="30px" height="10%">
					地址:台南市崇德路306巷
					</font>
					</span>
					<span style="padding-left:20px">
					<iframe  src="https://www.google.com/maps/embed?pb=!4v1559375222464!6m8!1m7!1spON72xpUR0CZIA8m066dxA!2m2!1d22.97696361829116!2d120.2229843711548!3f0!4f0!5f0.7820865974627469"  width="95%" height="70%" frameborder="0"  ></iframe>
					</span>
				</div>
				
				</div>
			</div>
		</div>
		
		
		<div id="menu" ></div>
		
	</div>
  
  <script>

</script>

  
  
  
    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; YU7 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>

</html>