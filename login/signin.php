<?php

    session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'users');

$mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql ->connect_errno) exit ('Ошибка');
$mysql->set_charset('utf8');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$mysql->close();

    $user_login = $_POST['user_login'];

    $user_password = md5($_POST['user_password']);

    $op_type = '1';
    $admin_type = '2';


    $check_op = mysqli_query($connect, "SELECT * FROM `users` WHERE user_login = '$user_login' AND md5(user_password) = '$user_password' AND type = '$op_type'");

    
    if ((mysqli_num_rows($check_op) > 0)) {

        $op = mysqli_fetch_assoc($check_op);

        $_SESSION['op'] = [
            "type" => $op['type']
        ];

        header('Location: ../op.php');

    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../index.php');
    }

     $check_admin = mysqli_query($connect, "SELECT * FROM `users` WHERE user_login = '$user_login' AND md5(user_password) = '$user_password' AND type = '$admin_type'");

    
    if ((mysqli_num_rows($check_admin) > 0)) {

        $admin = mysqli_fetch_assoc($check_admin);

        $_SESSION['admin'] = [
            "type" => $admin['type']
        ];

        header('Location: ../admin.php');

    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../index.php');
    }


    ?>
