<html> <body>
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT marka, model, year, trans, cost FROM auto_stock");

$zapros="UPDATE stock SET cost='".$_GET['cost'].
"', s_id='".$_GET['s_id']."', a_id='"
.$_GET['a_id']."' WHERE id="
.$_GET['id'];
 mysqli_query($induction, $zapros);
 if (mysqli_affected_rows($induction)>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться к списку
авто </a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку авто</a> '; }
?>
</body> </html>