<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}
?><?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'films');

$mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql ->connect_errno) exit ('Ошибка');
$mysql->set_charset('utf8');

$mysql->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT name, genre, director, box_office, id
FROM films");

$num_rows = mysqli_num_rows($result);

 // Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO films SET name='" . $_GET['name']
."', genre='".$_GET['genre']."', director='"
.$_GET['director']."', year='".$_GET['year'].
"', box_office='".$_GET['box_office']. "'";
 mysqli_query($induction, $sql_add); // Выполнение запроса
 if (mysqli_affected_rows($induction)>0) // если нет ошибок при выполнении запроса
 { print "<p>Фильм добавлен успешно.";
 print "<p><a href=\"index.php\"> Вернуться к списку
фильмов </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку фильмов </a>"; }
?>