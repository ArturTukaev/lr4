<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?>
<html>
<head> <title> Сведения о прользователях сайта </title> </head>
<body>

<?php
echo $user_login;
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

$users = mysqli_fetch_assoc($result);
//print_r($users);

?>

<body>

<h2>Зарегистрированные пользователи:</h2> 
<table border="1">
<tr> 
 <th> Имя </th> <th> E-mail </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result = mysqli_query($induction, "SELECT id_user, user_name, user_e_mail
FROM users");
while ($row=mysqli_fetch_assoc($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['user_name'] . "</td>";
 echo "<td>" . $row['user_e_mail'] . "</td>";
 echo "<td><a href='edit.php?id=" . $row["id_user"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete.php?id=" . $row['id_user']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего пользователей: $num_rows </p>");
?>
<p> <a href="new.html"> Добавить пользователя </a>
     <p></p>
<a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>
</body>

</body> </html>