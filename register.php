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
            
            <a href="index.php" onmouseover="document.getElementById('Time').style.display='block',document.getElementById('Night_Time').style.display='block';" onmouseout="document.getElementById('Time').style.display='none',document.getElementById('Night_Time').style.display='none';" style="cursor: pointer;">Доставка</a>
<div >
             <div id="Time"> <b>Доставка до 30 хвилин,або піцца безкоштовно!</b><br>
             Якщо курьєр запізнився,він видасть вам карту гарантії на одну безкоштовну піццу.
             <p>Мінімальна вартість замовлення - 200 грн. </p>
             <div id="Night_Time" ><b>Середній час доставки 25 хв</b></div>
         </div>
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
<form id="form_login">

<div class = "login_left_side">
    <p><b>Логін</b></p>
    <input type="text" size="40">
    
    <p><b>Електрона пошта</p></b>
    <input type="text" size="100%">
    <p><b>Пароль</p></b>
    <input type="text" size="40">
    <p><b>Повторіть пароль</p></b>
    <input type="text" size="40">
     <br><button><a href="login.php">Вже зареєстровані</button>
     <br><input type="submit" value="Реєстрація">
</div>
<div class ="login_right_side">
 <p>Реклама</p>
    </div>
   </form>



</body>


</html>
