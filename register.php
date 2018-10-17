<?php
session_start ();
?>
<?php require_once("includes/connection.php"); ?>
<?php

if(isset($_POST["register"])){


if(!empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['PasswordConf'])) {
  $email=$_POST['Email'];
  $password=$_POST['Password'];
  $passwordd=$_POST['PasswordConf'];
  

    
  $query=mysql_query("SELECT * FROM usertbl WHERE email='".$email."'");
  $numrows=mysql_num_rows($query);
  
  if($numrows==0)
  {
  	if($password==$passwordd){
  $sql="INSERT INTO usertbl
      (email,password) 
      VALUES('$email','$password')";

  $result=mysql_query($sql);


  if($result){
   $message = "Аккаунт успішно створено!";
  } else {
   $message = "Не вдалося зареєструвати аккаунт!";
  }

  }else {
  	$message="Паролі не співпадають!";
  }
  } else {
   $message = "Це ім'я користувача уже використовується.Спробуйте інше!";
  }

} else {
   $message = "Заповніть усі поля!";
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Реєстрація</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
	<link href="css/style.css" rel='stylesheet' type='text/css'/>
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">

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
					<h2>Sign Up </h2>
					  

						
						<span>(op)</span>
						<h3 >Вже <a href="login.php" style="color :white; text-decoration: underline; ">зареєстровані </a>?</h3>
						<form action="#" method="post">
							<div class="email">
							<input placeholder="E-Mail" name="Email" type="email"    >

							<span class="icons i1"><i class="fa fa-envelope-o" aria-hidden="true" ></i></span>
							</div>
							<div class="email">
							<input placeholder="Password" name="Password" type="password"  >

							<span class="icons i2"><i class="fa fa-unlock"p aria-hidden="true"></i></span>
							</div>
							<div class="email">

							<input placeholder="Confirm Password" name="PasswordConf" type="password" >

							<span class="icons i2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
							</div>
							<input type="submit" value="Реєстрація" name="register" >

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
	</div class="error">
	
</div>
<div><?php if (!empty($message)) {echo "<script>swal('Паролі не співпадають!', '', 'error');</script>";} ?></div>
</body>


</html>


