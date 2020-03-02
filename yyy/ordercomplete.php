<?php
session_start();
require_once 'config.php';
$response=array();

$account = $_SESSION['useraccount'];
$id = $_SESSION['orderid'];
$message="";
$sqlcheck="SELECT * FROM newuser WHERE account = '$account'";
$nameErr = $addressErr = $foodErr = $timeErr = "";
 $address = $food = $time  = "";

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
$sqlcheck="SELECT * FROM sushiorder WHERE id = '$id'";
if (!empty($result = $mysqli->query($sqlcheck))) {

    if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   //新版寫法
        $name = $row['name'];
        $food = $row['food'];
        $time = $row['time'];
        $address = $row['address'];
        //echo json_encode($row['id'] ,JSON_UNESCAPED_UNICODE);
        
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if ($_POST["action"]=="修改"){
	 
		$address= $_REQUEST['address'];
        $food = $_REQUEST['food'];
        $time = $_REQUEST['bookdate'];

		$checkwrong=100;$message=""; 
		// date("Y/m/d H:i:s")可以取得時間 要設定時區
		if(1==2){
          $checkinput=2;            
          $addressErr = "地址不符規定 ";
          $address = "";
          //--------------------------------------------帳號不符
        }
        if($food==""){
          $checkinput=3;            
          $foodErr = "食物不符規定 ";
          $food = "";
           //--------------------------------------------密碼不符
        }
        if(1==2){
          $checkinput=4;            
          $timeErr = "時間不符規定 ";
          $time = "";
           //--------------------------------------------郵件不符
        }



		if($checkwrong==100){
		// mysql update row with matched pid  //, updated_at = '$updated_at' email = '$email',
			$sql = "UPDATE sushiorder SET address ='$address', food = '$food', time = '$time'  WHERE id = '$id'";
			// check if row inserted or not
			if ($result = $mysqli->query($sql)) {
				// successfully updated
				echo "<script>alert('訂單修改成功'); location.href = 'ordersearch.php';</script>";
			}
		}
			
	}
	else{



		$sql = "DELETE FROM sushiorder WHERE id = '$id'";
		
		if ($result = $mysqli->query($sql)) {
			unset($_SESSION['orderid']);
			echo "<script>alert('訂單刪除成功'); location.href = 'ordersearch.php';</script>";
		}else{
			$message="訂單刪除失敗";
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

      <!--Import materialize.css-->
    

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>訂單修改</title>
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
      
        <div style="width:80%;text-align:center;margin-left:10%;">
          <div class="p-5 text-center">
           <h2 class="display-6 ">訂單修改</h2>
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post">                
            <table width="100%" style="margin:5px" >
              <tr>
                <td>您的姓名</td>
                <td><?php echo $name;?></td>
              </tr>
			  
              <tr>
               <td>食物</td>
               <td><select id="food" Name="food">
                  　<option value="shrimp">shrimp</option>
                  　<option value="tuna">tuna</option>
                  </select>
                </td>
              </tr>
			  
              <tr>
                <td>地址</td>
                <td><Input  Type="text" id="address" Name="address" value="<?php echo $address;?>" required></td>
                <td><span class="error"><?php echo $addressErr;?></span></td>
              </tr> 
			  
              <tr>
                <td>時間</td>
                <td id="date">
			    </td>
                <td><span class="error"><?php echo $timeErr;?></span></td>
              </tr> 
                    
              </table>
              <br>
				<div class="row d-flex justify-content-center">
				  <input class="btn1 col-5 rounded-pill"  value="修改" name="action"  type="submit" />
					&nbsp;
				  <input class="btn1 col-5 rounded-pill"  value="刪除" name="action"  type="submit" />
				</div>
              </form>
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
  <script>
function date(){
  var d = new Date();
  var n = d.toLocaleDateString('en-CA');
  document.getElementById("date").innerHTML ='<input type="date" name="bookdate"  min="'+n+'" max="2100-03-19"  value="<?php echo $time;?>" required>';
}
window.addEventListener('DOMContentLoaded', date)
  
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