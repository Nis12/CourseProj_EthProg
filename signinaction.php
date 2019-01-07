<?php
include_once 'function.php';
$in = $_REQUEST['in'];
if ($in == 0) {
    $login = $_REQUEST['login'];
    $pass = $_REQUEST['password'];
    $result = admins($login);
    $row = $result->num_rows;
    if ($row > 0) {
        $user = $result->fetch_assoc();
        $encRes = $user['encresult'];
        if (password_verify($pass, $encRes)) {
            session_start();
            $_SESSION['admin']++;
            echo "<h3>Вход выполнен</h3>";
            echo "<script>location.href='index.php?p=1'</script>";
        } else echo "<h3>Не верный пароль</h3>";
    } else {
        echo "<h3>Логин не найден</h3>";
        echo "<script>location.href='index.php?p=3'</script>";
    }
} elseif ($in == 1) {
    unset($_SESSION['admin']);
    echo "<h3>Выход выполнен</h3>";
    echo "<script>location.href='index.php?p=1'</script>";
}
