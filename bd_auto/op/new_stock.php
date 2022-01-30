<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}
?>

<html>
<meta charset="utf-8">
<head> <title> Добавление нового автомобиля </title> </head>
<body>
<H2>Добавление авто:</H2>
<form action="save_new_stock.php" metod="get">
Автомобиль: 
 <form action="save_new_stock.php" metod="get">
 <select class="select_services" id="a_id" input name="a_id">
<option class ="auto" selected disabled>Выберите авто</option>
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
<br>Автосалон: 
<form action="save_new_stock.php" metod="get">
<select class="select_salon" id="s_id" input name="s_id">
<option class ="salon" selected disabled>Выберите салон</option>
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
<br>Стоимость: <input name="cost" size="16" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>

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
</html>