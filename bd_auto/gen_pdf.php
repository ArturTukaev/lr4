<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PDF</title>
  </head>
  <body>

    <body>

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
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего автомобилей в наличии: $num_rows </p>");
?>


</body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>