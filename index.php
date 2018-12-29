<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Информация о кандидатах</title>
</head>
<body>
<h1>Информация о кандидатах</h1>
<p> <a href='index.php?p=1'>Кандидаты</a>&nbsp&nbsp
    <a href='index.php?p=2'>Партии</a>&nbsp&nbsp
    <a href='index.php?p=3&in=0'>Войти</a><p>
<?php
$p=$_REQUEST['p'];
if (($p==0)||($p==1))
    include_once 'candidate.php';
elseif ($p==2)
    include_once 'consignment.php';
elseif ($p==3)
    include_once 'signin.php';
elseif ($p==31)
    include_once 'signinaction.php';
elseif ($_SESSION['admin'] > 0){
    if ($p==11)
        include_once 'candidateform.php';
    elseif ($p==12)
        include_once 'candidatepost.php';
    elseif ($p==21)
        include_once 'consignmentform.php';
    elseif ($p==22)
        include_once 'consignmentpost.php';
} else {
    echo "<h3>Недостаточно прав, войдите под учетной записью администратора</h3>";
}

?>
<p>&copy Чечко Борис Сергеевич<p>
</body></html>