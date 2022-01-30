<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}
?><html>
<head> <title> Сведения о фильмах </title> </head>
<body>

<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'films');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT id, name, genre, director, year, box_office FROM films");

$fims = mysqli_fetch_assoc($result);

?>

<body>

<h2>Список фильмов:</h2> 
<table border="1">
<tr> 
 <th> Название </th> <th> Жанр </th> <th> Режиссёр </th>
 <th> Год выпуска </th>
 <th> Редактировать </th> </tr>
<?php
$result = mysqli_query($induction, "SELECT id, name, genre, director, year, box_office FROM films");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['genre'] . "</td>";
  echo "<td>" . $row['director'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
 echo "<td><a href='edit.php?id=" . $row["id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего фильмов: $num_rows </p>");
?>
<p> <a href="new.html"> Добавить фильм </a>
   <p></p>
<a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>
</body>

</body> </html>