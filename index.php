<?php
    session_start();
    require_once("includes/connection1.php"); 
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fast with RAVEN</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="cookie.js"></script>
</head>
<header>
<nav id="navigation_menu">
    
    <ul class="menu" >
        <li >
             <a href="login.php" id="out" onclick="vuhid()">Вихід</a> </li>

        </li>
        <li >
             <a href="login.php" id="log" >Вхід</a> </li>

        </li>
        <li>
            <a href="index.php">Додаткова інформація</a>
        </li>
        <li>
            <a href="index.php" >Час роботи</a>
        </li>
        <li >
            
            <a href="index.php" >Доставка</a>
<div >
             
</div>
        </li>
    </ul>
    <div class="logo"></div>
    </nav>


    <nav class="product_line">
<ul class="product_menu">
     
    <img src="/pictures/logo.png" class="pizza_men" >
    
      
        <li>
            <a href="#sides" class=" button ">Сайди</a>
        </li>
        <li>
            <a href="#drinks" class=" button ">Напої</a>
        </li>
        <li>
            <a href="#desserts" class=" button ">Десерти</a>
        </li>
        <li>
          <a href="#pizza" class=" button ">Піцца</a>
        </li>
       
    </ul>
    </nav>
    


</header>
    
</div>


                    
<body>


   

<section class="product_list">
    <div>
    <p><h3>Головне меню</h3> </p>
    <h5 id="pizza">Піцца</h5>
    <?php
    if($_SESSION['entr']==on){ 

    }else {
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=1") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
        echo "<div id='product'>".$row['name_product']."<br><img src='pictures/".$row['photo']."''><i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.</div>";
    }

    }
    ?>
    <h5 id="desserts">Десерти</h5>
    <h5 id="drinks">Напої</h5>
    <h5 id="sides">Сайди</h5>
</div>
    <div id="pizza_menu">
     
    </div>
</section>

</body>


</html>
<!--- jQuery--->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>

jQuery(function($) {
            $(window).scroll(function(){
                if($(this).scrollTop()>88){
                    $('.product_line').addClass('fixed');
                }
                else if ($(this).scrollTop()<140){
                    $('.product_line').removeClass('fixed');
                }
            });
        });

</script>