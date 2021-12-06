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
$result = mysqli_query($induction, "SELECT id, name, adres FROM auto_salon");


 $rows=mysqli_query($induction, "SELECT id, name, adres FROM auto_salon WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_assoc($rows)) {
 $id=$_GET['id'];
 $name = $st['name'];
 $adres = $st['adres'];
 } 
print "<form action='save_edit_salon.php' metod='get'>";
print "Название: <input name='name' size='50' type='text'
value='".$name."'>";
print "<br>Адрес: <input name='adres' size='20' type='text'
value='".$adres."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
автомобилей </a>";
?>
</body>
</html>