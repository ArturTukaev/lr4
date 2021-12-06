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


 $rows=mysqli_query($induction, "SELECT id, marka, model, year, cost, trans, vol FROM auto WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_assoc($rows)) {
 $id=$_GET['id'];
 $marka = $st['marka'];
 $model = $st['model'];
 $year = $st['year'];
 $trans = $st['trans'];
 $cost = $st['cost'];
  $vol = $st['vol'];
 } 
print "<form action='save_edit.php' metod='get'>";
print "Марка: <input name='marka' size='50' type='text'
value='".$marka."'>";
print "<br>Модель: <input name='model' size='20' type='text'
value='".$model."'>";
print "<br>Год: <input name='year' size='20' type='text'
value='".$year."'>";
print "<br>Трансмиссия: <input name='trans' size='30' type='text'
value='".$trans."'>";
print "<br>Стоимость: <input name='cost' size='30' type='text'
value='".$cost."'>";
print "<br>Объем: <input name='vol' size='30' type='text'
value='".$vol."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
автомобилей </a>";
?>
</body>
</html>