<html>
<head
<title> Редактирование данных об автомобиле </title>
</head>
<body>
<?php
 define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql1->close();
$result = mysqli_query($induction, "SELECT id, marka, model, year, cost, trans, vol FROM auto");


 $rows=mysqli_query($induction, "SELECT cost, a_id, s_id FROM stock WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_assoc($rows)) {
 $id=$_GET['id'];
 $cost = $st['cost'];
 $a_id = $st['a_id'];
 $s_id = $st['s_id'];
 } 
print "<form action='save_edit_stock.php' metod='get'>";
print "Стоимость: <input name='cost' size='50' type='text'
value='".$cost."'>";
print "<br>ID салона: <input name='s_id' size='20' type='text'
value='".$s_id."'>";
print "<br>ID авто: <input name='a_id' size='20' type='text'
value='".$a_id."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
автомобилей </a>";
?>
</body>
</html>