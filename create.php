<?php
require_once("includes/connection1.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fast with RAVEN</title>
    <link rel="stylesheet" href="css/css.css">
</head>


<div class="header_line">
    <header>




        <nav id="navigation_menu">

            <ul class="menu" >
                <li >
                    <a href="index.php" >Вхід</a>

                </li>
                <li>
                    <a href="index.php">Реєстрація</a>
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
                    <a href="index.php">Напої</a>
                </li>
                <li>
                    <a href="index.php">Піцца</a>
                </li>
                <li>
                    <a href="index.php">Соуси</a>
                </li>
                <li>
                    <a href="index.php">Десерти</a>
                </li>

            </ul>
        </nav>


    </header>

</div>



<body>




<section class="product_list">
    <div >
        <p> Конструктор піцци </p>
    </div>

<?php
 include('functions.php');
    $id_n=clear_string($_GET["id"]);
        $action = clear_string($_GET["action"]);
        switch ($action){
            case 'add':
        $que=mysql_query('DELETE FROM Type_Of_Number WHERE id_type='.$id_n);
$query=mysql_query('SELECT * FROM Type_Of_Number') or die(mysql_error());
while($row=mysql_fetch_assoc($query)){
echo "<div class='parallax-bg number'>";
echo "<div class='dws-wrapper'>
     <a href='one.php?id=".$row['id_type']."'><img src='img/".$row['img']."'  class='number_photo'>
    <div class='dws-text'>
        Детальніше...
        </div>
        </a>
        </div>
        <p>".$row['Type_number']."<br>
        <i class='fas fa-wallet'></i>Ціна: ".$row['Price']."грн.
        <br>
        <a href='index.php?id=".$row['id_type']."&action=delete'>
        <img src='img/delete.png' width='50'>
        </a>
        <a href='index5.php?id=".$row['id_type']."&action=change'>
        <img src='img/change.png' width='50'>
        </a>
        </p>
    </div><br><br>";
}
break;
       default:     
    $query=mysql_query('SELECT * FROM category_ingredients') or die(mysql_error());
while($row=mysql_fetch_assoc($query)){
    echo "<div class=''>".$row['name_category'];
    $query2=mysql_query('SELECT * FROM ingredients WHERE category_ingredient='.$row['id_category_ingr']) or die(mysql_error());
while($row1=mysql_fetch_assoc($query2)){
echo "<div class=''>";
echo "<img src='pictures/".$row1['img_ingredient']."''>";
echo  "<a href='create.php?id=".$row1['id_ingredient']."'><img src='pictures/add.jpg'  class='actions'></a>";
}
}
break;
}
echo "<a  href='index5.php?action=add'>
        <img class='ass' src='img/add.png' width='50'>
        </a>";
?>
</section>
</body>
</html>
