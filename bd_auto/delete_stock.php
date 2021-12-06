<?php
 define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');

$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');
$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$zapros="DELETE FROM stock WHERE id=" . $_GET['id'];
 mysqli_query($induction, $zapros);
 header("Location: index.php");
 exit;
?>