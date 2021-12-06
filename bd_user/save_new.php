<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'users');

$mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql ->connect_errno) exit ('Ошибка');
$mysql->set_charset('utf8');

$mysql->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($induction, "SELECT id_user, user_name, user_e_mail
FROM users");

$num_rows = mysqli_num_rows($result);

 // Строка запроса на добавление записи в таблицу:
 $sql_add = "INSERT INTO users SET user_name='" . $_GET['name']
."', user_login='".$_GET['login']."', user_password='"
.$_GET['password']."', user_e_mail='".$_GET['e_mail'].
"', user_info='".$_GET['info']. "'";
 mysqli_query($induction, $sql_add); // Выполнение запроса
print "<p>Спасибо, вы зарегистрированы в базе данных.";
 print "<p><a href=\"index.php\"> Вернуться к списку
пользователей </a>";
?>