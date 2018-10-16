<?php
    session_start();
    require_once("includes/connection1.php");
     if($_SESSION['entr']==on){
    include('functions.php');
    $id_n=clear_string($_GET["id"]);
        $action = clear_string($_GET["action"]);
        switch ($action){
            case 'add':
            $query1=mysql_query("SELECT count FROM Orders WHERE id_products=".$id_n) or die(mysql_error());
            $num=mysql_num_rows($query1);
            if($num==0){
                $id_k=mysql_query("SELECT id FROM usertbl WHERE email='".$_SESSION['email']."'") or die(mysql_error());
            $query=mysql_query("INSERT INTO `Orders`(`id_products`, `count`, `id_client`) VALUES (".$id_n.",1,".$id_k.")") or die(mysql_error());
            }else 
            {

            }
            break;
            default:
            break; 
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fast with RAVEN</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/favico.ico" type="image/x-icon">
<link rel="stylesheet" href="css/bootstrap-grid.css">
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
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=1") or die (mysql_error());
        while($row=mysql_fetch_assoc($query)){
    echo "<div class='parallax-bg number'>";
    echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
        <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }
    }else {
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=1") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
        <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }
    }
    ?>
    <h5 id="desserts">Десерти</h5>
    <?php
    if($_SESSION['entr']==on){ 
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=2") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
        <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }
    }else {
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=2") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
         <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }

    }
    ?>
    <h5 id="drinks">Напої</h5>
    <?php
    if($_SESSION['entr']==on){ 
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=3") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
        <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }
    }else {
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=3") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
         <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }

    }
    ?>
    <h5 id="sides">Сайди</h5>
    <?php
    if($_SESSION['entr']==on){ 
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=4") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
        <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }
    }else {
        $query=mysql_query("SELECT * FROM products WHERE id_type_product=4") or die (mysql_error());
    while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='index.php?id=".$row['id_product']."&action=add'><img src='pictures/".$row['photo']."'  class='number_photo' id='number_photo'>
    <div class='dws-text'>
        Додати до замовлення
        </div>
        </a>
        </div>
         <p><i class='fas fa-exclamation-circle'></i>".$row['name_product']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['price']."грн.
        </p>
    </div><br><br>";
    }
    }
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