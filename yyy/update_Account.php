<?php
session_start(); 
/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */
require_once 'config.php';

// array for JSON response
$response = array();

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
// check for required fields

//先將錯誤訊息設定為空
$nameErr = $passwordErr = $emailErr = $phoneErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if ($_POST["action"]=="修改"){
	 
		  $name = $_REQUEST['name'];
		  $password = $_REQUEST['password'];
		  $email = $_REQUEST['email'];
		  $phone = $_REQUEST['phone'];

		$updated_at =date("Y/m/d H:i:s");
		$checkwrong=100;
		// date("Y/m/d H:i:s")可以取得時間 要設定時區
			if(!preg_match('/^(?!_|\s\')[A-Za-z0-9_\x80-\xff\s\']+$/',$name)){
			  $checkwrong=1;        
			  $nameErr = " 名稱不符規定 ";
			  $name = "";
			   //--------------------------------------------名稱不符
			}

			if(preg_match('/[^a-zA-Z0-9_-]/', $password)||strlen($password) < 6){
			  $checkwrong=3;            
			  $passwordErr = "密碼不符規定 ";
			  $password = "";
			   //--------------------------------------------密碼不符
			}
			if(!preg_match('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/', $email)){
			  $checkwrong=4;            
			  $emailErr = "電子郵件不符規定 ";
			  $email = "";
			   //--------------------------------------------郵件不符
			}
			if(!preg_match("/09[0-9]{2}[0-9]{6}/", $phone)){
			  $checkwrong=5;            
			  $phoneErr = "手機不符規定 ";
			  $phone = "";
			   //--------------------------------------------手機不符
			}



		if($checkwrong==100){
		// mysql update row with matched pid  //, updated_at = '$updated_at' email = '$email',
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "UPDATE newuser SET name ='$name', password = '$hash', email = '$email', phone = '$phone'  WHERE account = '$account'";
			// check if row inserted or not
			if ($result = $mysqli->query($sql)) {
				// successfully updated
				echo "<script>alert('資料修改成功'); location.href = 'index.php';</script>";
			}
		}
			
	}
	else{



		$sql = "DELETE FROM newuser WHERE account = '$getid'";
		
		if ($result = $mysqli->query($sql)) {
			unset($_SESSION['useraccount']);
			echo "<script>alert('帳號刪除成功'); location.href = 'login.php';</script>";
		}else{
			$message="帳號刪除失敗";
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
    <title>修改資料-松田寿司</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
	
	
	<style>
	body{
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
			text-align:center;
			font-family:標楷體;
			font-size:18px;
			background-color:white;
			border-radius: 30px 30px;
			border: 2px solid #73AD21;
			padding: 20px; 
			width: 550px;
			height: 350px; 
			box-shadow: 10px 10px 5px grey;	
		}
		#p-4 {
			padding-top: 0rem ;
			padding-right: 3rem ;
			padding-bottom: 3rem ;
			padding-left: 3rem ;
		}
		.error{
			color:red;
		}
		.btn1 {
			display: inline-block;
			font-weight: 200;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			user-select: none;
			border: 1px solid transparent;
			padding: .375rem .75rem;
			font-size: 1rem;
			line-height: 1.5;
			transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		}
</style>
	
  </head>
  <body style="min-height: 100%;display: flex; flex-direction: column; ">
    <div style="flex: 1">
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="index.php"><h2 id="head" class="display-7"><div>松田壽司</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          </ul>
        </div>
      </div>
    </nav>
    <section>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div id="p-4">
            <div id="p-4 text-center">
			  <div id="rcorners2" style="margin-top:50px;">
              <h2 class="display-8 ">個人資料修改</h2>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post">                
            <table class="d-flex justify-content-center" name="course" width="100%" >
              <tr>
                <td>帳號</td>
                <td><?php echo $account;?></td>
              </tr>
              <tr>
                <td>您的姓名&nbsp;&nbsp;&nbsp;</td>
                <td><Input  Type="text" id="name" Name="name" value="<?php echo $name;?>" required></td>
                <td><span class="error"><?php echo $nameErr;?></span></td>
              </tr>
              <tr>
                <td>密碼</td>
                <td><Input  Type="text" id="password" Name="password" value="" ></td>
                <td><span class="error"><?php echo $passwordErr;?></span></td>
              </tr>   
              <tr>
                <td>信箱</td>
                <td><Input  Type="text" id="email" Name="email" value="<?php echo $email;?>" required></td>
                <td><span class="error"><?php echo $emailErr;?></span></td>
              </tr> 
              <tr>
                <td>電話</td>
                <td><Input  Type="text" id="phone" Name="phone" value="<?php echo $phone;?>" required></td>
                <td><span class="error"><?php echo $phoneErr;?></span></td>
              </tr> 
              <tr>
                <td><span style="color: red"><?php echo $message;?></span></td>
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
          </div>
        </div>
      </div>
    </section>
</div>
    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Ray 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>

</html>




