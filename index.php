<?php
    session_start();
    require_once("includes/connection1.php");
    include('functions.php');
    $id_n=clear_string($_GET["id"]);
        $action = clear_string($_GET["action"]);
        switch ($action){
            case 'add':
            $query2=mysql_query("SELECT id FROM usertbl WHERE email='".$_SESSION['email']."'") or die(mysql_error());
                while($row=mysql_fetch_assoc($query2)){
                    $id_k=$row['id'];
                }
            $query1=mysql_query("SELECT count FROM Orders WHERE id_products=".$id_n." AND id_client=".$id_k) or die(mysql_error());
           
            $num=mysql_num_rows($query1);
            if($num==0){
            $query=mysql_query("INSERT INTO `Orders`(`id_products`, `count`, `id_client`) VALUES (".$id_n.",'1',".$id_k.")") or die(mysql_error());
            }else 
            {
            
                $query4=mysql_query("SELECT * FROM `Orders` WHERE `id_client`=".$id_k." AND `id_products`=".$id_n) or die(mysql_error());
                while($row=mysql_fetch_assoc($query4)){
                    $cou=$row['count'];
                }
                 
                $count=$cou+1;
                
                $query3=mysql_query("UPDATE `Orders` SET `count`=".$count.",`id_client`=".$id_k." WHERE id_products=".$id_n) or die(mysql_error());
            }
            break;
            case 'alert':
            $message = "Ви не авторизувались !";
            echo "<script>alert(".$message.");</script>";

            break;
            default:
            break; 
        }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fast with RAVEN</title>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="css/css.css">
       <!-- Latest compiled and minified CSS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="cookie.js"></script>
</head>
<header><div ID = "toTop" >  </div>
<div>
<nav id="navigation_menu">
 
   <ul class="list-inline">
    <ul class="menu"  class="list-inline">
        <li >
             <a href="login.php" id="out" onclick="vuhid()">Вихід</a> </li>

        </li>
        <li >
             <a href="login.php" id="log" >Вхід</a> 

        </li>

        <li>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Більшість ресторанів працюють з 10:00 - 23:00">Час роботи</a>
        </li>
        <li >
            
             <a href="#" data-toggle="tooltip" data-placement="bottom" title="Доставка за 30 хвилин,або піцца - безкоштовно!">Доставка</a>
             

        </li>
    </ul>
</ul>
    <div class="logo"></div>

    </nav>




   <nav class="navbar navbar-expand-lg navbar-light bg-light " class="product_line">
  <a class="navbar-brand" href="#">Навігаційне меню</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" >
      <li class="nav-item active">
       <a href="#sides" class=" button ">Cайди <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a href="#drinks" class=" button ">Напої</a>
      </li>
      <li class="nav-item">
         <a href="#desserts" class=" button ">Десерти</a>
      </li>
      <li class="nav-item">
        <a href="#pizza" class=" button ">Піцца</a>
      </li>
    </ul>
  </div>

</nav>
    



</header>
    
</div>


                    
<body>


   

<section class="product_list">
    <div>
    <p><h3>Головне меню</h3> </p>
    <h5 id="pizza">Піцца</h5>
    <?php
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=1") or die (mysql_error());
        $n=0;
        $close=true;
        while($row=mysql_fetch_assoc($query)){
            if($n%4==0 || $n==0){
                echo "<div class='list'>";
                $close=false;
            }
    echo "<div class='parallax-bg number'>";
    echo "<div class='dws-wrapper'>";
    if($_SESSION['entr']==on) {echo"<a href='index.php?id=".$row['id_product']."&action=add'>";}
    else { echo"<a href='index.php?id=".$row['id_product']."&action=alert'>";}
     echo "<img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        <img src='images/add.png'>
        </div>
        </a>
        </div>
        <i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
    </div>";
    $n++;
    if($n%4==0){
                echo "</div>";
                $close=true;
            }
    }
    if($close==false){
        echo "</div>";
    }
    ?>
    <h5 id="desserts">Десерти</h5>
    <?php
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=2") or die (mysql_error());
        $n=0;
        $close=true;
        while($row=mysql_fetch_assoc($query)){
            if($n%4==0 || $n==0){
                echo "<div class='list'>";
                $close=false;
            }
    echo "<div class='parallax-bg number'>";
    echo "<div class='dws-wrapper'>";
    if($_SESSION['entr']==on) {echo"<a href='index.php?id=".$row['id_product']."&action=add'>";}
    else { echo"<a href='index.php?id=".$row['id_product']."&action=alert'>";}
     echo "<img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        <img src='images/add.png'>
        </div>
        </a>
        </div>
        <i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
    </div>";
    $n++;
    if($n%4==0){
                echo "</div>";
                $close=true;
            }
    }
    if($close==false){
        echo "</div>";
    } 
    ?>
    <h5 id="drinks">Напої</h5>
    <?php
   $query=mysql_query("SELECT * FROM products WHERE id_type_product=3") or die (mysql_error());
        $n=0;
        $close=true;
        while($row=mysql_fetch_assoc($query)){
            if($n%4==0 || $n==0){
                echo "<div class='list'>";
                $close=false;
            }
    echo "<div class='parallax-bg number'>";
    echo "<div class='dws-wrapper'>";
    if($_SESSION['entr']==on) {echo"<a href='index.php?id=".$row['id_product']."&action=add'>";}
    else { echo"<a href='index.php?id=".$row['id_product']."&action=alert'>";}
     echo "<img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        <img src='images/add.png'>
        </div>
        </a>
        </div>
        <i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
    </div>";
    $n++;
    if($n%4==0){
                echo "</div>";
                $close=true;
            }
    }
    if($close==false){
        echo "</div>";
    }
    ?>
    <h5 id="sides">Сайди</h5>
    <?php
    $query=mysql_query("SELECT * FROM products WHERE id_type_product=4") or die (mysql_error());
        $n=0;
        $close=true;
        while($row=mysql_fetch_assoc($query)){
            if($n%4==0 || $n==0){
                echo "<div class='list'>";
                $close=false;
            }
    echo "<div class='parallax-bg number'>";
    echo "<div class='dws-wrapper'>";
    if($_SESSION['entr']==on) {echo"<a href='index.php?id=".$row['id_product']."&action=add'>";}
    else { echo"<a href='index.php?id=".$row['id_product']."&action=alert'>";}
     echo "<img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        <img src='images/add.png'>
        </div>
        </a>
        </div>
        <i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
    </div>";
    $n++;
    if($n%4==0){
                echo "</div>";
                $close=true;
            }
    }
    if($close==false){
        echo "</div>";
    }
    echo "<br><br><br>";
    ?>
</div>
    <div id="pizza_menu">
     
    </div>
</section>




</body>


</html>
<!--- jQuery--->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>




$(function() {
$(window).scroll(function() {
if($(this).scrollTop() != 0) { 
$('#toTop').fadeIn(); 
} else { 
$('#toTop').fadeOut(); 
} 
}); 
$('#toTop').click(function() { 
$('body,html').animate({scrollTop:0},800); 
});
});


</script>
