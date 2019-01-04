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

function encrypt($decRes, $pass) {
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($decRes, $cipher, $pass, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $pass, $as_binary=true);
    $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
    return $ciphertext;
}

function decrypt($encRes, $pass) {
    $c = base64_decode($encRes);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $plaintext = openssl_decrypt($ciphertext_raw, $cipher, $pass, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $pass, $as_binary=true);
    if (hash_equals($hmac, $calcmac))
        return $plaintext;
     else
        return null;

}