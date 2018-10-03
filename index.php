<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fast with RAVEN</title>
    <link rel="stylesheet" href="css/css.css">
</head>


<header>
     
 

   
<nav id="navigation_menu">
    
    <ul class="menu" >
        <li >
             <a href="login.php" >Вхід</a> </li>

        </li>
        <li>
            <a href="Register.php">Реєстрація</a>
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
            <a href="index.php" class=" button ">Напої</a>
        </li>
        <li>
            <a href="index.php" class=" button ">Піцца</a>
        </li>
        <li>
            <a href="index.php" class=" button ">Соуси</a>
        </li>
        <li>
          <a href="index.php" class=" button ">Десерти</a>
        </li>
       
    </ul>
    </nav>


</header>
    
</div>


                    
<body>


   

<section class="product_list">
    <div >
       <p> Головне меню </p>

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