<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?><html>
<head>
<title> Редактирование данных о фильме </title>
</head>
<body>
<?php
 define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'films');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql1->close();
$result = mysqli_query($induction, "SELECT name, genre, director, year, box_office FROM films");


 $rows=mysqli_query($induction, "SELECT name, genre,
director, year, box_office FROM films WHERE
id=".$_GET['id']);
 while ($st = mysqli_fetch_assoc($rows)) {
 $id=$_GET['id'];
 $name = $st['name'];
 $genre = $st['genre'];
 $director = $st['director'];
 $year = $st['year'];
 $blox_office = $st['box_office'];
 } 
print "<form action='save_edit.php' metod='get'>";
print "Название: <input name='name' size='50' type='text'
value='".$name."'>";
print "<br>Жанр: <input name='genre' size='20' type='text'
value='".$genre."'>";
print "<br>Режиссер: <input name='direcotr' size='20' type='text'
value='".$director."'>";
print "<br>Год: <input name='year' size='30' type='text'
value='".$year."'>";
print "<br>Кассовые сборы: <textarea name='box_office' rows='4'
cols='40'>".$box_office."</textarea>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
фильмов </a>";
?>
</body>
</html>