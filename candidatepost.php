<?php
include_once 'function.php';
$m = $_REQUEST['m'];
if ($m == 1) {
    $fiocandidate = $_REQUEST['fiocandidate'];
    $age = $_REQUEST['age'];
    $idconsignment = $_REQUEST['idconsignment'];
    $position = $_REQUEST['position'];
    $married = $_REQUEST['married'];

    if (empty($fiocandidate) || empty($age) || ($idconsignment == 0) || !($married == 1 || $married == 0) || empty($position)) {
        echo "<h3>Введены НЕ все данные</h3>";
    } elseif(candidatecheck($fiocandidate, $age, $idconsignment, $position, $married)->num_rows > 0) {
        echo "<h3>Кандидат уже зарегистрирован</h3>";
    } else {
        candidateins($fiocandidate, $idconsignment, $age, $position, $married);
        echo "<script>location.href='index.php?p=1'</script>";
    }

}
if ($m == 2) {
    $idcandidate = $_REQUEST['id'];
    $fiocandidate = $_REQUEST['fiocandidate'];
    $age = $_REQUEST['age'];
    $position = $_REQUEST['position'];
    $idconsignment = $_REQUEST['idconsignment'];
    $married = $_REQUEST['married'];
    $check = candidatecheck($fiocandidate, $age, $idconsignment, $position, $married);
    $row=$check->fetch_assoc();
    if (empty($fiocandidate) || empty($age) || ($idconsignment == 0) || !($married == 1 || $married == 0) || empty($position)) {
        echo "<h3>Введены НЕ все данные</h3><p>";
    } elseif($check->num_rows > 0 & $row['idcandidate'] != $idcandidate) {
        echo "<h3>Кандидат уже зарегистрирован</h3>";
        echo "<h3>Данные объединены с имеющимся кандидатом</h3>";
        candidatedel($idcandidate);
    } else {
        candidateupd($idcandidate, $fiocandidate, $idconsignment, $position, $age, $married);
        echo "<script>location.href='index.php?p=1'</script>";
    }
}
if ($m == 3) {
    $idcandidate = $_REQUEST['id'];
    candidatedel($idcandidate);
    echo "<script>location.href='index.php?p=1'</script>";
}