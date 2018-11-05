<?php session_start();
?>
<?php http://127.0.0.1/openserver/phpmyadmin/sql.php?server=1&db=Hotel&table=num&pos=0&token=f2afcaeaaeda486b9ba0ee921c1eecc0#
header('Content-Type: text/html; charset=utf-8');
require_once("includes/connection1.php");
if(isset($_POST['send'])){
    $query3=mysql_query("DELETE FROM Orders WHERE id_client=(SELECT id FROM `usertbl` where email='".$_SESSION['email']."')");
}
$query=mysql_query("SELECT * FROM Orders WHERE id_client=(SELECT id FROM `usertbl` where email='".$_SESSION['email']."')");
$numrows=mysql_num_rows($query);
include("functions.php");
if($numrows!=0){
        $id_n=clear_string($_GET["id"]);
        $action = clear_string($_GET["action"]);
    switch ($action) {
        case 'cancel':
        $query2=mysql_query("DELETE FROM Orders WHERE id_client=(SELECT id FROM `usertbl` where email='".$_SESSION['email']."') AND id_products=".$id_n) or die(mysql_error());
        echo"<h2 class='marg'>Піцци додані в замовлення.</h2>";
     echo "
     <div class='colmn'>";
         echo "
         <div class='block'><table class='simple-little-table' >";
    echo "<th>Назва продукту.</th>";
    echo "<th>Фото</th>";
    echo "<th>Кількість</th>";
    echo "<th>Відміна</th>";
    while($row=mysql_fetch_assoc($query)){
    echo "<tr>";
    $idx=1;
    $querys=mysql_query("SELECT * FROM Orders INNER JOIN Products ON Products.id_product=Orders.id_products WHERE Orders.id_products=".$row['id_products']) or die(mysql_error());
    while($row1=mysql_fetch_assoc($querys)){
        printf("<td>%s</td>", $row1['name_product']);
        printf("<td>%s</td>", "<img src='pictures/".$row1['photo']."' id='ph'");
        printf("<td>%s</td>", $row['count']);
        $button="<a href='cabinet.php?id=".$row['id_products']."&action=cancel'><img src='images/delete.png' width='30'></a>";
       printf("<td>%s</td>", $button);
        break;
    }
        if($idx%4==0) {
            echo "</tr><tr>";
        }
        $idx++;
    }
    echo "</table></div>";
    echo '<div class="block"> 
    <form class="frm" method="post">
    <input type="text" placeholder="Адреса" id="address" autocomplete="off">
    <input type="submit" name="send" value="Доставити(30хв)"">
    </form>
    </div>';
            break;
    echo "</table>";
            break;
        default:
     echo"<h2 class='marg'>Піцци додані в замовлення.</h2>";
     echo "
     <div class='colmn'>";
         echo "
         <div class='block'><table class='simple-little-table' >";
    echo "<th>Назва продукту.</th>";
    echo "<th>Фото</th>";
    echo "<th>Кількість</th>";
    echo "<th>Відміна</th>";
    while($row=mysql_fetch_assoc($query)){
    echo "<tr>";
    $idx=1;
    $querys=mysql_query("SELECT * FROM Orders INNER JOIN Products ON Products.id_product=Orders.id_products WHERE Orders.id_products=".$row['id_products']) or die(mysql_error());
    while($row1=mysql_fetch_assoc($querys)){
        printf("<td>%s</td>", $row1['name_product']);
        printf("<td>%s</td>", "<img src='pictures/".$row1['photo']."' id='ph'");
        break;
    }
        printf("<td>%s</td>", $row['count']);
        $button="<a href='cabinet.php?id=".$row['id_products']."&action=cancel'><img src='images/delete.png' width='30'></a>";
       printf("<td>%s</td>", $button);
        if($idx%4==0) {
            echo "</tr><tr>";
        }
        $idx++;
    }
    echo "</table></div>";
    echo '<div class="block"> 
    <form class="frm" method="post">
    <input type="text" placeholder="Адреса" id="address" autocomplete="off">
    <input type="submit" name="send" value="Доставити(30хв)"">
    </form>
    </div>';
            break;
    }
}
    else $message="Ви не додали жодної піцци в замовлення.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <script src="js/jquery.maskedinput.js"></script>
	<link rel="stylesheet" href="css/style_cabinet.css">
<script src="js/bootstrap.js"></script> <!-- BS -->
<script src="js/libraries/jquery-3.2.1.min.js"></script> <!-- jQuery Library -->
<script src="js/libraries/jquery.waypoints.min.js"></script>  <!-- Waypoints Library  -->
<script src="js/libraries/midnight.jquery.min.js"></script> <!-- MidNight Library -->
<script src="js/libraries/jquery.visible.js"></script> <!-- Visible Library  -->
<script src="js/libraries/jquery-ui.min.js"></script> <!-- jQuery UI -->
 <script src='cookie.js'></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script><link href="css/style.css" rel='stylesheet' type='text/css'/>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<title>Особистий кабінет.</title>
</head>
<script type="text/javascript" src="js.js"></script>
	
    <header>
       
    <div class="txt_zavd">
        <div class="logo">

        </div>
       <a href="login.php" class="right" onclick="vuhid()" id="out">Вийтиs</a>
       <a href="login.php" class="right" id="p1">Увійти</a>
       <a href="login.php" class="right" id="p1">Увійти</a>
       <a href="login.php" class="right" id="p1">Увійти</a>
       <a href="index.php" class="right" id="p1">На головну</a>
</div>
    </header>
<body>

<table>
</table>
</body>
</html>
<?php if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";} ?>
