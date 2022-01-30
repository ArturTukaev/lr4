<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}
?>
<html>
<head> <title> Автомобили </title> </head>
<body>

<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('ы');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT id, marka, model, year, trans, vol, cost FROM auto");

$fims = mysqli_fetch_assoc($result);

?>

<body>

<h2>Автомобили:</h2> 
<table border="1">
<tr> 
 <th> ID </th> <th> Марка </th> <th> Модель </th> <th> Год </th>
 <th> Трансмиссия</th> <th> Стоимость</th>
 <th> Редактировать </th> </tr>
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
 echo "<td><a href='edit_auto.php?id=" . $row["id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего авто: $num_rows </p>");
?>
<p> <a href="new_auto.html"> Добавить авто </a>


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
 <th> ID </th> <th> Название </th> <th> Адрес</th> <th> Редактировать </th> </tr>
<?php
$result = mysqli_query($induction, "SELECT id, name, adres FROM auto_salon");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['adres'] . "</td>";
 echo "<td><a href='edit_salon.php?id=" . $row["id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего автосалонов: $num_rows </p>");
?>
<p> <a href="new_salon.html"> Добавить автосалон</a>

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

$result = mysqli_query($induction, "SELECT stock_id, cost, a_id, s_id FROM stock");

$fims = mysqli_fetch_assoc($result);

?>

<body>

<h2>Автомобили в наличии:</h2> 
<table border="1">
<tr> 
 <th> Стоимость </th> <th> ID салона </th> <th> ID авто </th>
 <th> Редактировать </th> </tr>
<?php
$result = mysqli_query($induction, "SELECT stock_id, cost, a_id, s_id FROM stock");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['cost'] . "</td>";
 echo "<td>" . $row['s_id'] . "</td>";
  echo "<td>" . $row['a_id'] . "</td>";
 echo "<td><a href='edit_stock.php?stock_id=" . $row["stock_id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего автомобилей в наличии: $num_rows </p>");
?>
<p> <a href="new_stock.php"> Добавить авто в наличии</a>
  <form action ="gen_pdf.php" method ="POST">
    <button type ="submit" name ="btn_pdf" class="btn btn-success">PDF</button>
  </form>
    <form action ="gen_xls.php" method ="POST">
    <button type ="submit" name ="btn_pdf" class="btn btn-success">XLS</button>
  </form>
   <p></p>
  <a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>
</body>

</body> </html>



