<?php
session_start();
unset($_SESSION['orderid']);
require_once 'config.php';
$response=array();
$account = $_SESSION['useraccount'];

$message="";
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
$data = $mysqli->query("SELECT * FROM sushiorder WHERE name = '$name'");
$sqlcheck="SELECT * FROM sushiorder WHERE name = '$name'";
if (!empty($result = $mysqli->query($sqlcheck))) {

    if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   //新版寫法
        $id = $row['id'];
		$name = $row['name'];
        $food = $row['food'];
        $time = $row['time'];
        $address = $row['address'];
        //echo json_encode($row['id'] ,JSON_UNESCAPED_UNICODE);
        
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	//echo "<script>alert($id);</script>";
	$id = $_POST["id"];
	$sqlcheck="SELECT * FROM sushiorder WHERE id = '$id'";
	$result = $mysqli->query($sqlcheck);
	if(!empty(mysqli_fetch_array($result, MYSQLI_ASSOC))){
	  $_SESSION['orderid'] = $id;
          
      echo "<script>location.href = 'ordercomplete.php';</script>";
    }else{
	  echo "<script>alert('訂單不存在或錯誤');</script>";
      $messageErr = "訂單不存在或錯誤";
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

      <!--Import materialize.css-->
    

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>訂單查詢</title>
	<link rel="icon" href="image/favicon.ico">
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
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
	body{
		background-image: url("image/bk1.jpg");
	}
	#container {
		width:100%
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
		height:800px;width:15%;
		float:left;
		}
	#content {
		background-image: url("image/bk1.jpg");
		height:800px;
		width:70%;
		float:left;
	}
	#rcorners3 {
			float:left;
			 background-image: url("image/bk1.jpg");
			width: 15%;
			height: 280px; 
			
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
			border: 0px solid #73AD21;
			padding: 0px; 
			width: 70%;
			height: 600px; 
			box-shadow: 0px 0px 10px grey; 					
		}
			#rcorners5{
			float:left;
			font-family:標楷體;
			font-size:18px;
			background:rgba(100%,100%,100%,0.8);
			padding: 0px; 
			width: 100%;
			height: 100%; 				
		}
	.p-4 {
			padding-top: 1rem !important;
			padding-right: 0rem !important;
			padding-bottom: 1rem !important;
			padding-left: 0rem !important;
		}
	.collapsible {
			border-top: 1px solid #ddd;
			border-right: 1px solid #ddd;
			border-left: 1px solid #ddd;
		}
	.collapsible-header {
		display: flex;
		cursor: pointer;
		-webkit-tap-highlight-color: transparent;
		line-height: 1.5;
		padding: 1rem;
		background-color: #fff;
		border-bottom: 1px solid #ddd;
	}
	.collapsible-body {
    border-bottom: 1px solid #ddd;
    box-sizing: border-box;
    padding: 2rem;
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
					
					<div style="margin-bottom:10px ">
						
					</div>
				</div>
			</div>
			
			<div class="p-4">
				<div id="rcorners4">
				
				<div id="rcorners5">
	
      
    <section>
      <div class="container">
        <div class="row align-items-center">
         <!-- <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid" src="https://img.ltn.com.tw/Upload/liveNews/BigPic/600_php9sH3LV.jpg" width="100%" alt="">
            </div>
          </div>-->
          <div style="width:100%;text-align:center;">
            <div class="p-5">
              <h2 class="display-6" style="border-bottom: solid 2px #bebebe;">您的訂單</h2>
              <p></p>
              <table width="100%" style="margin:5px" >
              <tr style="border-bottom: dotted 2px #632d00;">
              <td>您的姓名</td>
              <td>地址</td>
              <td>食物</td>
              <td>取餐日期</td>
              </tr>
              <?php
              for($i=1;$i<=mysqli_num_rows($data);$i++)
              { $SD=mysqli_fetch_row($data);
              ?>
			  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post">
              <tr>
			  <input type="hidden" name="id" value="<?php echo $SD[0];?>">
              <td><?php echo $SD[1];?></td>
              <td><?php echo $SD[2];?></td>
              <td><?php echo $SD[3];?></td>
			  <td><?php echo $SD[4];?></td>
			  <td><input class=""  value="修改" name="action"  type="submit" id="<?php echo $SD[0];?>" /></td>
              </tr>
			  </form>
              <?php 
              }
              ?>
            </table>

			</div>
          </div>
        </div>
      </div>
    </section>
				</div>
				</div>
				
			</div>
		</div>
		
		<div id="menu" >
			
		</div>
		
		
	</div>
  
  
  
  
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