<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?>
<html>
<head>
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

?>
<body>

<h3>Редактируемый автомобиль:</h3> 
<table border="1">
<tr> 
 <th> Стоимость </th> <th> ID салона </th> <th> ID авто </th>
</tr>
<?php
$result = mysqli_query($induction, "SELECT stock_id, cost, a_id, s_id FROM stock WHERE stock_id=".$_GET['stock_id']);
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['cost'] . "</td>";
 echo "<td>" . $row['s_id'] . "</td>";
  echo "<td>" . $row['a_id'] . "</td>";
 echo "</tr>";
}
print "</table>";
?>
 <br>
</body>
<?php

 $rows=mysqli_query($induction, "SELECT cost, a_id, s_id FROM stock WHERE stock_id=".$_GET['stock_id']);
 while ($st = mysqli_fetch_assoc($rows)) {
 $stock_id=$_GET['stock_id'];
 $cost = $st['cost'];
 $a_id = $st['a_id'];
 $s_id = $st['s_id'];
 } 
print "<form action='save_edit_stock.php' metod='get'>";
print "Стоимость: <input name='cost' size='50' type='text'
value='".$cost."'>";
?>
<br>Автосалон: 
<form action="save_new_stock.php" metod="get">
<select class="select_salon" id="s_id" input name="s_id">

<?php
 define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');


$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT * FROM auto_salon");
/*while($id = mysqli_fetch_assoc($result))
{
    ?>
    <option class ="salon" value ="<?=$id['id']; ?>"><?=$id['id'];?></option>

<?php
}*/
?>
<option value="1">Витязь</option>
<option value="2">Лебедь</option>
</select>
<form action="save_edit_stock.php" metod="get">
 <br>Автомобиль: 
 <form action="save_edit_stock.php" metod="get">
 <select class="select_services" id="a_id" input name="a_id">

<?php
 define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');


$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT * FROM auto");
/*while($id=mysqli_fetch_assoc($result))
{
    ?>
    <option class ="auto" value ="<?=$id['id'];?>"><?=$id['id'];?></option>
<?php
}*/
?>
<option value="1">Лада</option>
<option value="2">БМВ</option>
</select>
<?php
print "<input type='hidden' name='stock_id' value='".$stock_id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
?>
</body>
<body>

<h2>Автомобили:</h2> 
<table border="1">
<tr> 
 <th> ID </th> <th> Марка </th> <th> Модель </th> <th> Год </th>
 <th> Трансмиссия</th> <th> Стоимость</th> </tr>
<?php
$result = mysqli_query($induction, "SELECT * FROM auto");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['marka'] . "</td>";
 echo "<td>" . $row['model'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['trans'] . "</td>";
    echo "<td>" . $row['cost'] . "</td>";
 echo "</tr>";
}
print "</table>";
?>


</body>

</body> </html>

<?php
 define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');


$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT id, name, adres FROM auto_salon");

?>

<body>

<h2>Автосалоны:</h2> 
<table border="1">
<tr> 
 <th> ID </th> <th> Название </th> <th> Адрес</th></tr>
<?php
$result = mysqli_query($induction, "SELECT id, name, adres FROM auto_salon");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['adres'] . "</td>";
 echo "</tr>";
}
print "</table>";
?>

</body>

</body> </html>
<p>
<a href="index.php"> Вернуться к списку авто </a>
</body>

<body>

<h2>Автомобили в наличии:</h2> 
<table border="1">
<tr> 
 <th> Стоимость </th> <th> ID салона </th> <th> ID авто </th>
</tr>
<?php
$result = mysqli_query($induction, "SELECT stock_id, cost, a_id, s_id FROM stock");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['cost'] . "</td>";
 echo "<td>" . $row['s_id'] . "</td>";
  echo "<td>" . $row['a_id'] . "</td>";
 echo "</tr>";
}
print "</table>";
?>
</body>
<p>
<a href="index.php"> Вернуться к списку авто </a>
</html>