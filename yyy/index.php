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
      首頁-松田寿司
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
	.mySlides {
		-webkit-transition: opacity 1s ease-in-out;
		  -moz-transition: opacity 1s ease-in-out;
		  -o-transition: opacity 1s ease-in-out;
		  transition: opacity 1s ease-in-out;
		  opacity:0;
		  filter:alpha(opacity=0);
		}
	</style>
  </head>
  <body>
  <div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.3&appId=887401964752126&autoLogAppEvents=1"></script>
    <style>
	#font{
		font-family:標楷體;
	}
	body{
		background-image: url("image/bk1.jpg");
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
		height:400px;width:15%;
		float:left;
		}
	#content {
		background-image: url("image/bk1.jpg");
		height:400px;
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
		#rcorners3-f {
			float:left;
			margin:20px 10px;
			font-family:標楷體;
			text-align:center;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			border-radius: 10px 10px;
			border: 0px solid #73AD21;
			padding: 0px; 
			width: 40%;
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
			height: 350px; 
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
			margin:30px 10px;
			font-family:標楷體;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			border-radius: 10px 10px;
			border: 2px solid #73AD21;
			padding: 0px; 
			width: 50%;
			height: 280px; 
			box-shadow: 0px 0px 10px grey;	
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
	#left2 {float:left;margin:24px 6px;}
	#news {
		margin-left:2%;
		border: 0px solid #632d00;
		border-bottom: 0px solid #04b2a0;
		padding-top:1em;
		font-size:18px;
		width:96%;
		}
		
	.news_title h2{
		font-family:Forte;
		-webkit-text-stroke: 1px #000;
		-webkit-text-fill-color: transparent;
		border-bottom: solid 2px #9C9C9C;
		font-style:oblique;
		font-size: 36px;
		font-weight: normal;
		line-height: 1em;
		margin-left:10px;
		padding: 7px 0 0 30px;
		}

	.news_title {
		background-image:url(./img/tab01.gif);
		height: 20px;
		text-align: left;
		padding: 0px;
		width:96%;
		}
		
	.more_link {
		-webkit-text-stroke: 1px #000;
		-webkit-text-fill-color: transparent;
		padding:0px; float:right;
		font-size:14px;
		}
	dl {
		border-bottom: dotted 2px #632d00;
		clear: both;
		margin: 0;
		padding: 3px 0;
		}
		
	dt {
		color: #fe9901;
		float: left;
		margin-left: 10px;
		padding: 0;
		width: 5em;
		}
		
	dd {
		margin: 0;
		padding: 0;
		margin-left: 7em;
		}
	.blink {
		animation-duration: 0.8s;
		animation-name: blink;
		animation-iteration-count: infinite;
		animation-direction: alternate;
		animation-timing-function: ease-in-out;
	}
	@keyframes blink {
		0% {
			opacity: 1;
		}
		30% {
			opacity: 1;
		}
		70% {
			opacity: 0;
		}
		100% {
			opacity: 0;
		}
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
					
						<div class="news_title">
							<h2><p class="blink">News</p></h2>
						</div>
						<br>
						<div id="news">
							<!-- // ▼以下是最新訊息區▼ -->
							<dl>
								<dt>2019.6.18</dt>
								<dd><a href="#1">每個月農曆16菜市場休息，請多加注意</a></dd>
								<div class="clear_both"></div>
							</dl>

							<!-- //  -->
							<dl>
								<dt>2019.6.05</dt>
								<dd><a href="news.html#02">端午連假不休息，請不要錯過了</a></dd>
								<div class="clear_both"></div>
							</dl>

							<!-- //  -->
							<dl>
								<dt>2018.8.30</dt>
								<dd><a href="#">白鵝颱風將至，留意最新公告</a></dd>
								<div class="clear_both"></div>
							</dl>
							
							<dl>
								<dt>2018.8.28</dt>
								<dd><a href="#">風雨目前沒有威脅通行，仍正常營業，還請顧客多加留意</a></dd>
								<div class="clear_both"></div>
							</dl>
							
							<dl>
								<dt>2018.8.03</dt>
								<dd><a href="#">最近海鮮料調漲，老闆佛心堅持不漲價</a></dd>
								<div class="clear_both"></div>
							</dl>
							
							<dl>
								<dt>2018.7.28</dt>
								<dd><a href="#">最近氣溫逐漸提高，建議盡早食用，久放請冰冰箱冷藏</a></dd>
								<div class="clear_both"></div>
							</dl>
							
							<dl>
								<dt>2018.4.05</dt>
								<dd><a href="#">豆皮最近原料減少，暫時停止供應整條訂</a></dd>
								<div class="clear_both"></div>
							</dl>
							<!-- // ▲以上是最新訊息區▲ -->
							<a href="#" class="more_link">>>更多訊息</a>
						</div>
						
					
				</div>
			</div>
		</div>
		
		
		<div id="menu" ></div>
		<div id="menu" ></div>
		
		<div id="content">
			<div class="p-4">
				<div id="rcorners5">
					<div class="w3-content w3-section" style="width:90%;float:left;margin-left:5%;">
					  <img class="mySlides" src="image/pic1.jpg" style="width:100%; height:250px">
					  <img class="mySlides" src="image/pic2.jpg" style="width:100%; height:250px">
					  <img class="mySlides" src="image/pic3.jpg" style="width:100%; height:250px">
					  <img class="mySlides" src="image/pic4.jpg" style="width:100%; height:250px">
					</div>
				</div>
			</div>
			
			<div id="rcorners3-f">
			<div class="fb-page" data-href="https://www.facebook.com/&#x53f0;&#x5357;&#x744b;&#x5927;&#x689d;-514608762248952/" data-tabs="timeline" data-width="700" data-height="280" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/&#x53f0;&#x5357;&#x744b;&#x5927;&#x689d;-514608762248952/" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/&#x53f0;&#x5357;&#x744b;&#x5927;&#x689d;-514608762248952/">
						台南瑋大條
					</a>
				</blockquote>
			</div>
			</div>
		
		
		</div>
		
		<div id="menu" ></div>
		
	</div>
  
  <script>
 var myIndex = 0;
carousel1();

function carousel1() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
	x[i].style.opacity = "0"; 
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";
  x[myIndex-1].style.opacity = "100";
  setTimeout(carousel1, 2000); // Change image every 2 seconds
}

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
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