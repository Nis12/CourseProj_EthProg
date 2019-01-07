<?php
session_start();
echo "
<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <title>Информация о кандидатах</title>
    
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   <link rel='stylesheet' href='styles.css' type='text/css'>
    
</head>
<body>

<div id = 'wrap'>
 <header>
 <h1>Информация о предвыборной компании</h1>
<br>
</header>
</div>
<div id='left'>
<ul>
<li><p/><a href='index.php?p=1' class='menu'>Кандидаты</a></li>
<li><p/><a href='index.php?p=2' class='menu'>Партии</a></li>";
if ($_SESSION['admin'] > 0) {
    echo "
<li><p/><a href='index.php?p=3&in=1' class='menu'>Выйти</a></li>
<hr><p class='admin'>Администратор</p>";
} else {
    echo "<li><p/><a href='index.php?p=3&in=0' class='menu'>Войти</a></li>";
}
echo "</ul>";
echo "</div><div id='mid' class='container'>";

$p = $_REQUEST['p'];
if (($p == 0) || ($p == 1))
    include_once 'candidate.php';
elseif ($p == 2)
    include_once 'consignment.php';
elseif ($p == 3)
    include_once 'signin.php';
elseif ($p == 31)
    include_once 'signinaction.php';
elseif ($_SESSION['admin'] > 0) {
    if ($p == 11)
        include_once 'candidateform.php';
    elseif ($p == 12)
        include_once 'candidatepost.php';
    elseif ($p == 21)
        include_once 'consignmentform.php';
    elseif ($p == 22)
        include_once 'consignmentpost.php';
} else
    echo "<h3>Недостаточно прав, войдите под учетной записью администратора</h3>";
echo "</div>
<div id='footer'>
<p>&copy Чечко Борис Сергеевич</p>
</div>
</body></html>";