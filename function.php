<?php
error_reporting( E_ERROR );
function dbconnect()
{
    $db = new mysqli('localhost', 'root', '#Te2*1aSq7X&', 'elections', 3306, 'MySQL');
    if (mysqli_connect_errno())
    {
        $error=mysqli_connect_error();
        $errorno=mysqli_connect_errno();
        exit ("<p>Подключение невозможно: $errorno - $error<p>");
    }
    else
    {
        return $db;
    }
}
function candidate()
{
    $query =
        "SELECT consignment.consignment, candidate.idcandidate, candidate.idconsignment, candidate.
fiocandidate, candidate.age, candidate.position, candidate.married
FROM candidate INNER JOIN consignment ON candidate.idconsignment = consignment.idconsignment
ORDER BY consignment.consignment, candidate.fiocandidate";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function candidateid($id)
{
    $query =
        "SELECT idcandidate, fiocandidate, idconsignment, age, position, married
FROM candidate
WHERE idcandidate = $id";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function candidatecheck($fiocandidate, $age, $idconsignment, $position, $married) {
    $query =
        "SELECT *
FROM candidate
WHERE fiocandidate = '$fiocandidate' and age = $age and idconsignment = $idconsignment and position = '$position' and married = $married";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function candidateins($fiocandidate, $idconsignment, $age, $position, $married)
{
    $query =
        "INSERT INTO candidate (fiocandidate, idconsignment, age, position, married)
VALUES ('$fiocandidate', $idconsignment, $age, '$position', $married)";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function candidateupd($idcandidate, $fiocandidate, $idconsignment, $position, $age, $married)
{
    $query =
        "UPDATE candidate SET fiocandidate='$fiocandidate', idconsignment= $idconsignment,
                     age=$age, position = '$position', married = $married WHERE idcandidate= $idcandidate";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function candidatedel($idcandidate)
{
    $query =
        "DELETE FROM candidate WHERE idcandidate=$idcandidate";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function consignment()
{
    $query =
        "SELECT idconsignment, consignment
FROM consignment
ORDER BY consignment ASC";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function consignmentid($id)
{
    $query =
        "SELECT idconsignment, consignment
FROM consignment
WHERE idconsignment=$id";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function consignmentins($consignment)
{
    $query =
        "INSERT INTO consignment (consignment) VALUES ('$consignment')";
    $handle=dbconnect();
    $handle->query($query);
}
function consignmentupd($idconsignment, $consignment)
{
    $query =
        "UPDATE consignment SET consignment='$consignment' WHERE idconsignment=$idconsignment";
    $handle=dbconnect();
    $handle->query($query);
}
function consignmentdel($idconsignment)
{
    $query =
        "DELETE FROM consignment WHERE idconsignment=$idconsignment";
    $handle=dbconnect();
    $handle->query($query);
}
function admins($login)
{
    $query =
       "SELECT * FROM administrator WHERE login LIKE '$login'";
    $handle=dbconnect();
    $result = $handle->query($query);
    return $result;
}
function adminins($login, $pass)
{
    $query =
        "INSERT INTO administrator (login, encresult) VALUES ('$login', $pass)";
    $handle = dbconnect();
    $handle->query($query);
}
function admindel ($idadmin){
    $query =
        "DELETE FROM administrator WHERE idadministrator=$idadmin";
    $handle=dbconnect();
    $handle->query($query);
}