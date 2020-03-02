<?php
session_start();
unset($_SESSION['useraccount']);
require_once 'config.php';

$response = array();

$messageErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $account = $_REQUEST['account'];
      $password = $_REQUEST['password'];
      $hash="";
        if( preg_match('/^[\w\x80-\xff]{3,15}$/', $account) && strlen($password) >= 6){
			
              $sqlcheck="SELECT * FROM newuser WHERE account = '$account'";
            $result = $mysqli->query($sqlcheck);
			if (!empty($result = $mysqli->query($sqlcheck))) {

				if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   //新版寫法
					$hash=$row['password'];
					
				}
			}
                
            if (password_verify($password, $hash)) {
            //if(!empty(mysqli_fetch_array($result, MYSQLI_ASSOC))){

        
                  //-------------------------------------------------------------------取得帳號
                  $_SESSION['useraccount'] = $account;
            
              echo "<script>alert('登入成功'); location.href = 'index.php';</script>";
            }else{
                  $messageErr = "帳號不存在或密碼錯誤";
            } 
        }else{            
                $messageErr = "帳號不存在或密碼錯誤";      
        }   

}
?>
<!DOCTYPE html>
<html lang="en" style="height:100%">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <!--<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>-->
	  
	  
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Let browser know website is optimized for mobile-->
	  <link rel="icon" href="image/favicon.ico">
	
    <title>
      登入-松田寿司
     </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
	
	<style>
		body {
		background-image: url("image/bk1.jpg");
		}
		#head{
			font-family:標楷體;
			color:white;
		}
		.signup{
			border: 5px solid #aa9911;
			font: normal 14px helvetica;
			color: #9911aa;
		}
		#rcorners2 {
			font-family:標楷體;
			font-size:18px;
			background-color:white;
			border-radius: 30px 30px;
			border: 2px solid #73AD21;
			padding: 20px; 
			width: 340px;
			height: 350px; 
			box-shadow: 10px 10px 5px grey;	
		}
		#rcorners3 {
			background-image: url("image/pic1.jpg");
			border-radius: 10px 10px;
			border: 0px solid #73AD21;
			padding: 20px; 
			width: 352px;
			height: 480px; 
			margin-top: 10px;
			margin-left:50px;
		}
	</style>
  </head>
  <body style="min-height: 100%;display: flex; flex-direction: column; ">
	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  
  	<div style="flex: 1">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="#"><h2 id="head" class="display-7"><div>松田壽司</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          </ul>
        </div>
      </div>
    </nav>

    <!--<header class="masthead">
    </header>-->
	
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-1">
            <div id="rcorners3" class="p-5">
              <!--<img class="img-fluid" src="pic1.jpg" alt="" style="margin-top:30px;">-->
            </div>
          </div>
          <div class="col-lg-6 order-lg-2">
            <div id="rcorners2" style="margin-top:50px;;">
		  <center>
              <h2 class="display-7">會員登入</h2>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post">

              <table border="0" style="margin-bottom:15px;" style="margin-left:100%;" width="30%" >
              <tr>
              <td colspan="1" style="padding-left:70px">帳號</td>
			  </tr>
			  <tr>
              <td colspan="1" style="width: 40%" ><Input  Type="text" id="account" Name="account" required></td>
              </tr>
              <tr>
			 <td colspan="1" style="padding-left:70px" >密碼</td>
			 </tr>
			 <tr>
             <td colspan="1" style="width: 40%" ><Input  Type="text" id="password" Name="password" required></td>             
            </tr>
            <tr>
			<td colspan="1" style="width: 40%" style="height: 40px;" ><a href="create_Account.php">註冊帳號</a></td>
            </tr>
			<tr>
            <td style="width: 40%" rowspan="1"><input class="btn rounded"  value="登入" name="submit" style="padding:5px 75px 5px 75px"  type="submit" /></td>			  
			</tr>
            </table>
             <span style="color:red"><?php echo $messageErr;?></span>  
			</center>

            </form>

            </div>
          </div>
        </div>
      </div>
    </section>

    </div>

    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      </body>

</html>
