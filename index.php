<?php
session_start();

if ($_SESSION['op']) {
    header('Location: op.php');
}

if ($_SESSION['admin']) {
    header('Location: admin.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>

    <form action="login/signin.php" method="post">
        <label>Логин</label>
        <input type="text" name="user_login">
                <p>
        </p>
        <label>Пароль</label>
        <input type="password" name="user_password">
                <p>
        </p>
        <button type="submit">Войти</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>