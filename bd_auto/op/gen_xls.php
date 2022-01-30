<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}
?>
<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=instock.xls");
 ?>
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

$result = mysqli_query($induction, "SELECT id, cost, a_id, s_id FROM stock");

?>

<body>

<h2>Автомобили в наличии:</h2> 
<table border="1">
<tr> 
 <th> № </th><th> Марка </th> <th> Модель </th> <th> Год выпуска </th> <th> Трансмиссия </th> <th> Стоимость </th></tr>
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
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
?>
<table border="1">
  <th> Название автосалона </th> <th> Адрес </th>
<?php
$result = mysqli_query($induction, "SELECT name, adres FROM auto_salon");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['adres'] . "</td>";
 echo "</tr>";
}
print "</table>";
$result = mysqli_query($induction, "SELECT * FROM stock");
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего автомобилей в наличии: $num_rows </p>");
?>
</table>