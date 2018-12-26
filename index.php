<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Информация о кандидатах</title>
</head>
<body>
<h1>Информация о кандидатах</h1>
<p><a href='index.php?p=1'>Кандидаты</a>&nbsp&nbsp<a
        href='index.php?p=2'>Партии</a><p>
<?php
$p=$_REQUEST['p'];
if (($p==0)||($p==1))
    include_once 'candidate.php';
if ($p==11)
    include_once 'candidateform.php';
if ($p==12)
    include_once 'candidatepost.php';
if ($p==2)
    include_once 'consignment.php';
if ($p==21)
    include_once 'consignmentform.php';
if ($p==22)
    include_once 'consignmentpost.php';
?>
<p>&copy Чечко Борис Сергеевич<p>
</body></html>