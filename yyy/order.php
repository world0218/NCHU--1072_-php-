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
$nameErr = $addressErr = $foodErr = $timeErr = "";

 $address = $food = $time  = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      //接收 form 表單 input 值
      $address= $_REQUEST['address'];
      $food = $_REQUEST['food'];
      $time = $_REQUEST['bookdate'];
	
      $checkinput=100; $message=""; 
        if(1==2){
          $checkinput=2;            
          $addressErr = "地址不符規定 ";
          $address = "";
          //--------------------------------------------帳號不符
        }
        if(1==2){
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
    

          if($checkinput==100)
          {
             /*  $sqlcheck="SELECT * FROM sushiorder WHERE name = '$name'";
               $result = $mysqli->query($sqlcheck);
                 if(!empty(mysqli_fetch_array($result, MYSQLI_ASSOC))){
                      $accountErr = "帳號已被使用";
                }else{
                */
                  $sql = "INSERT INTO sushiorder(name, address, food, time) VALUES('$name', '$address', '$food', '$time')";


                  // check if row inserted or not
                  if ($result = $mysqli->query($sql)) {
                    // successfully inserted into database
                    //$_SESSION['User']=$_REQUEST['account'];
                    //$response["account"]=$_SESSION['User'];
                 echo "<script>alert('訂單創建成功'); location.href = 'ordersearch.php';</script>";
                    //當註冊帳號時 順便在通知資料表也新增帳號資料  
                   // $sqltonotification = "INSERT INTO usernotification(name) VALUES('$name')";
                    //$resultnotification = $mysqli->query($sqltonotification);
                  } else {
                    // failed to insert row
                 echo "<script>alert('發生未知錯誤'); location.href = 'order.php';</script>";
                  }
                //}
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
    <title>下訂單</title>
	<link rel="icon" href="image/favicon.ico">
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
			font-family:標楷體;
			font-size:18px;
			background-color:white;
			border-radius: 30px 30px;
			border: 2px solid #73AD21;
			padding: 20px; 
			width: 400px;
			height: 350px; 
			box-shadow: 10px 10px 5px grey;	
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
          <div class="col-lg-6 order-lg-1">
            <div class="p-5 text-center">
			  <div id="rcorners2" style="margin-top:50px;;">
              <h2 class="display-8 ">寄送訂單</h2>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post" onsubmit="alert(form1.address.value)">     
            <table class="d-flex justify-content-center" name="course" width="100%" >
             
              <tr>
                <td>您的姓名&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $name;?></td>
              </tr>
              <tr>
                <td>地址</td>
                <td><Input  Type="text" id="address" Name="address" value="<?php echo $address;?>" required></td>
                <td><span class="error"><?php echo $addressErr;?></span></td>
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
                <td>時間</td>
                <td id="date">
			    </td>
                <td><span class="error"><?php echo $timeErr;?></span></td>
              </tr>          
              </table>
              <br>
             
              <input class="btn col-5 rounded-pill"  value="送出" name="action"  type="submit" />
           
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
	<script language="javascript">
　
function date(){
  var d = new Date();
  var n = d.toLocaleDateString('en-CA');
  document.getElementById("date").innerHTML ='<input type="date" name="bookdate"  min="'+n+'" max="2100-03-19"  value="<?php echo $time;?>" required>';
}
window.addEventListener('DOMContentLoaded', date)
</script>
  </body>

</html>




