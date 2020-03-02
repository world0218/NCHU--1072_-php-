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
    <title>店鋪簡介-松田寿司</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
	<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <style>
	body{
		background-image: url("image/bk1.jpg");
	}
	#container {
		width:100%
		height:100%;
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
	#nav{
		width:80%;
		margin-left:10%;
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
		height:700px;width:15%;
		float:left;
		}
	#content {
		background-image: url("image/bk1.jpg");
		height:700px;
		width:70%;
		float:left;
	}
		#navcontent {
		background:rgba(100%,100%,100%,0);
		height:100px;
		width:90%;
		float:left;
		margin-left:5%;
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
		item-align:center;
			float:left;
			margin:10px 10px;
			font-family:標楷體;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			border-radius: 10px 10px;
			border: 2px solid #73AD21;
			padding: 0px; 
			width: 70%;
			height: 600px; 
			box-shadow: 0px 0px 10px grey; 					
		}
			#rcorners5{
			float:left;
			margin-left:10%;
			font-family:標楷體;
			font-size:18px;
			background:rgba(255,236,100,1);
			padding: 0px; 
			width: 80%;
			height: 100%; 				
		}
		#font{
			font-family:標楷體;
		}
		#font0{
			font-family:標楷體;
			padding-top:1em;
			border-bottom:2px solid #000;
			width:80%;
			margin-left:10%;
		}
		#font1{
			font-family:標楷體;
			line-height:20px;
			padding:1em;
		}
	.p-4 {
			padding-top: 1rem !important;
			padding-right: 0rem !important;
			padding-bottom: 1rem !important;
			padding-left: 0rem !important;
		}
	#rain{
		float:left;
		width:25%;
		height:100%;
	}	
	#imgrain{
		width:100%;
		float:left;
	}
	#myBtn {
		 display: none;
		 position: fixed;
		 bottom: 20px;
		 right: 30px;
		 z-index: 99;
		 border: circle;
		 outline: none;
		 background-color: red;
		 color: white;
		 cursor: pointer;
		 padding: 15px;
		 border-radius: 50px;
		}

	#myBtn:hover {
		background-color: #00ffff;
  
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
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="30" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="40" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="50" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="20" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>

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
				
				<div id="rcorners5">
				<font color="#33691e" align="center"><h2 id="font0">店家介紹</h2></font>
				<h5 id="font1">&nbsp&nbsp 位於台南一小小果菜市場，有25年的歷史，價格始終不變的，就是想給顧客最親民，最熟悉的味道的傳統壽司攤-松田壽司，有別於現代的日本料理壽司店，去掉生食，融合台灣味道，創造自己的壽司。
						<br><br>&nbsp&nbsp一盒70實實在在的配料，有干貝唇，鮑魚，貝類，魚卵，蟹肉棒……等經過調理後的海鮮料，還有經典黑皮、豆皮和花壽司，讓顧客吃得津津有味，老顧客都說讚，每逢佳節，不管端午，母親甚至過年，老闆不休息就是為了給老顧客想要的，當作佳節美食與家人一同齊樂。
						<br><br>&nbsp&nbsp雖然創新壽司店日益興起，但秉持著不變的價格和熟悉的味道不受影響，挽留老饕的味蕾。最後來台南玩時，不妨可以來來位於崇德市場，的松田壽司，品嚐看看。</h5>
						<!--<marquee  behavior="alternate" scrollamount="30"><img src="mpic.PNG" style="width:50px"></marquee>-->
				</div>
				</div>
				
			</div>
		</div>
		
		<div id="menu" >
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="30" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="40" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="50" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>
			<div id="rain">
				<marquee  direction="down" behavior="alternate" scrollamount="20" width="50% "height="100%">
					<img src="image/mpic.PNG" id="imgrain">
				</marquee>
			</div>

		</div>
		
		
	</div>
  
  <script>
	// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
  </script>
  
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  
  
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