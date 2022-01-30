<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}

?>

<html>
<meta charset="utf-8">
<head> <title> Добавление нового фильма </title> </head>
<body>
    Уровень доступа: администратор
<p></p>
<a href="bd_user/admin/index.php"> Самостоятельная работа №4 </a>
<p></p>
<a href="bd_film/admin/index.php"> Самостоятельная работа №5 </a>
<p></p>
<a href="bd_auto/admin/index.php"> Практическая работа №5 </a>
<p></p>
<form>
        <a href="login/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>