<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}
?>
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');

$mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql ->connect_errno) exit ('Ошибка');
$mysql->set_charset('utf8');

$mysql->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT * FROM stock");

$num_rows = mysqli_num_rows($result);

 // Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO stock SET cost='" . $_GET['cost']
."', s_id='".$_GET['s_id']."', a_id='"
.$_GET['a_id']."'";
 mysqli_query($induction, $sql_add); // Выполнение запроса
 if (mysqli_affected_rows($induction)>0) // если нет ошибок при выполнении запроса
 { print "<p>Автомобиль добавлен успешно.";
 print "<p><a href=\"index.php\"> Вернуться к списку
авто </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку авто </a>"; }
?>