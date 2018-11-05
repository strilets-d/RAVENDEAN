<?php session_start();
?>
<?php http://127.0.0.1/openserver/phpmyadmin/sql.php?server=1&db=Hotel&table=num&pos=0&token=f2afcaeaaeda486b9ba0ee921c1eecc0#
header('Content-Type: text/html; charset=utf-8');
require_once("includes/connection1.php");
$query=mysql_query("SELECT * FROM Orders WHERE id_client=(SELECT id FROM `usertbl` where email='".$_SESSION['email']."')");
$numrows=mysql_num_rows($query);
include("functions.php");
if($numrows!=0){
        $id_n=clear_string($_GET["id"]);
        $action = clear_string($_GET["action"]);
    switch ($action) {
        case 'cancel':
    $qur=mysql_query('UPDATE Numbers SET Used=0, id_client=NULL WHERE id_number='.$id_n) or die(mysql_error());
    $query=mysql_query("SELECT * FROM Numbers WHERE id_client=(SELECT id_client FROM `Clients` where login='".$_SESSION['user']."')");
$numrows=mysql_num_rows($query);
if($numrows==0){$message="У вас немає наявних орендованих номерів!"; break;}
         echo"<h2 class='marg'>Орендовані номери</h2>";
         echo "<table class='simple-little-table' >";
    echo "<th>Номер</th>";
     echo "<th>Тип номеру</th>";
    echo "<th>Дата початку проживання</th>";
    echo "<th>Дата кінця проживання</th>";
    echo "<th>Дія</th>";
    while($row=mysql_fetch_assoc($query)){
    echo "<tr>";
    $idx = 1;
        $qury=mysql_query("SELECT Type_number FROM Type_of_Number WHERE id_type=(SELECT Type_number FROM Numbers WHERE id_number=".$row['id_number'].")") or die(mysql_error());
        printf("<td>%s</td>", $row['id_number']);
        while($row1=mysql_fetch_assoc($qury)){
        printf("<td>%s</td>",$row1['Type_number']);
    }
        printf("<td>%s</td>", $row['sdate']);
        printf("<td>%s</td>", $row['fdate']);
        $button="<a href='cabinet.php?id=".$row['id_number']."&action=cancel'><img src='img/delete.png' width='30'>";
       printf("<td>%s</td>", $button);
        if($idx%3==0) {
            echo "</tr><tr>";
        }
        $idx++;
    echo "</tr>";
    }
    echo "</table>";
            break;
        default:
     echo"<h2 class='marg'>Піцци додані в замовлення.</h2>";
         echo "<table class='simple-little-table' >";
    echo "<th>Назва продукту.</th>";
    echo "<th>Кількість</th>";
    while($row=mysql_fetch_assoc($query)){
    echo "<tr>";
    $idx=1;
        printf("<td>%s</td>", $row['id_product']);
        printf("<td>%s</td>", $row['count']);
        $button="<a href='cabinet.php?id=".$row['id_client']."&action=cancel'><img src='img/delete.png' width='30'>";
       printf("<td>%s</td>", $button);
        if($idx%3==0) {
            echo "</tr><tr>";
        }
        $idx++;
    }
    echo "</table>";
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
	<title>Вхід у особистий кабінет.</title>
</head>
<script type="text/javascript" src="js.js"></script>
	
    <header>
       
    <div class="txt_zavd">
        <div class="logo">

        </div>
       <a href="login.php" class="right" onclick="vuhid()" id="out">Вийти</a>
       <a href="login.php" class="right" id="p1">Увійти</a>
       <a href="login.php" class="right" id="p1">Увійти</a>
    
</div>
    </header>
<body>


</body>
</html>
<?php if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";} ?>