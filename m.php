	<?php
    session_start();
                                                                  
             if(isset($_GET['send']))
             {
                              $conn = mysqli_connect("localhost","root","","project");
                 $name=$_GET['username'];
    $password=$_GET['pass'];
                 if(!$conn)
{
    die ('could not connect'.mysql_error());
}
$query=mysqli_query($conn,"SELECT * FROM register WHERE name='$name' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="1.php";//
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid Reg no or Password";
$extra="m.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>



                                                         


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <style>
        .errors{
        font-size: 14px;
        color: red;
        font-style: italic;
    }
    </style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form"  method="get" novalidate >
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                      <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                                                         

					<div class="wrap-input100" >
						<input class="input100" type="text" id="uname" name="username" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xf191;" ></span><span class="errors" id="err1" style="float:right;margin-top:-20px;"></span>
					</div>

					<div class="wrap-input100 " >
						<input class="input100" type="password" name="pass" id="pswd" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;" ></span><span class="errors" id="err2" style="float:right;margin-top:-20px;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="send" id="submit">
LOGIN
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>

     <script>       
       var btns=document.getElementById('submit');
       function checking()
       {
           var checkes=1;
           var names=document.getElementById('uname');
           if(names.checkValidity)
	{
	document.getElementById("err1").innerHTML=names.validationMessage;
if(names.validationMessage.toString().length!=0)
    checkes=0;
	}
           var company=document.getElementById('pswd');
            if(company.checkValidity)
	{
	document.getElementById("err2").innerHTML=company.validationMessage;
if(company.validationMessage.toString().length!=0)
    checkes=0;
	}
          
	if(checkes==0)
        {
            return false;
        }
           else{
               return true;
           }
           
       };
       btns.onclick=function(e){ 
           var checkes=checking();   
                               if(checkes==false) 
                                  e.preventDefault();
                               
                               };
       </script>
          
             

	
</body>
</html>