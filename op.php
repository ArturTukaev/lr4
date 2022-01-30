<?php
session_start();
if (!$_SESSION['op']) {
    header('Location: index.php');
}

?>

<html>
<meta charset="utf-8">
<head> <title> Добавление нового фильма </title> </head>
<body>
    Уровень доступа: оператор
<p></p>
<a href="bd_user/op/index.php"> Самостоятельная работа №4 </a>
<p></p>
<a href="bd_film/op/index.php"> Самостоятельная работа №5 </a>
<p></p>
<a href="bd_auto/op/index.php"> Практическая работа №5 </a>
<p></p>
<form>
        <a href="login/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>