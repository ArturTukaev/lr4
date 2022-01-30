<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?><html> <body>
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'films');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT id, name, genre, director, year, box_office FROM films");

$films = mysqli_fetch_assoc($result);
//print_r($users);
 $zapros="UPDATE films SET name='".$_GET['name'].
"', genre='".$_GET['genre']."', director='"
.$_GET['director']."', year='".$_GET['year'].
"', box_office='".$_GET['box_office']."' WHERE id="
.$_GET['id'];
 mysqli_query($induction, $zapros);
 if (mysqli_affected_rows($induction)>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться к списку
фильмов </a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку фильмов</a> '; }
?>
</body> </html>