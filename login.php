<?php
session_start ();
?>
<?php require_once("includes/connection.php"); 
?>
<?php
if(isset($_SESSION["session_email"])){
header("Location:login.php");
session_destroy();
}

if(isset($_POST["login"])){

if(!empty($_POST['Email']) && !empty($_POST['Password'])) {
    $email=$_POST['Email'];
    $password=$_POST['Password'];

    $query =mysql_query("SELECT * FROM usertbl WHERE email='".$email."' AND password='".$password."'");
    $numrows=mysql_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysql_fetch_assoc($query))
    {
    $dbemail=$row['email'];
    $dbpassword=$row['password'];
    }
    

    if($email == $dbemail && $password == $dbpassword)
    {
    $_SESSION['session_email']=$dbemail;
    $_SESSION['entr']='on';
    header("Location:index.php");
    }

    } else {
 $message =  "Неправильний логін або пароль!";
    }

} else {
    $message = "Заповніть всі поля!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Реєстрація</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	ss
		
	<link href="css/style.css" rel='stylesheet' type='text/css'/>
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
	<script src="cookie1.js"></script>

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			<script src="js/jquery.min.js"></script>
			<script>$(document).ready(function(c) {
			$('.alert-close').on('click', function(c){
				$('.main-agile').fadeOut('slow', function(c){
					$('.main-agile').remove();
				});
			});	  
		});
		</script>
</head>
<body>
<div class="layer">
	<h1>Вернутись на <a href="index.php">Головну</a> </h1>
	<div class="main-agile1">
		<div class="w3layouts-main">
					<h2>Log in </h2>
						<span>(op)</span>
						<h3 >Не <a href="register.php" style="color :white; text-decoration: underline; ">зареєстровані </a>?</h3>
						<form action="#" method="post">
							<div class="email">
							<input placeholder="E-Mail" name="Email" id="Email" type="email" required="">
							<span class="icons i1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
							</div>
							<div class="email">
							<input placeholder="Password" name="Password"  id="Password" type="password" required="">
							<span class="icons i2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
							</div>
							<input type="submit" value="Увійти" name="login" onclick="setCookie()">
						</form>
		</div>
		<div class="main-agile">
			<div class="alert-close"> </div>
			<div class="content-wthree">
				
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-w3l">
		<p class="agileinfo"> &copy; 2018 Sign Up and Subscribe Form. All Rights Reserved | Design by Ravendean</p>
	</div>
</div>
</body>
</html>