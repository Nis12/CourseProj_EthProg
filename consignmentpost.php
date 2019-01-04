<?php
include_once 'function.php';
$m=$_REQUEST['m'];
if ($m==1)
{
    $consignment=$_REQUEST['consignment'];
    if (empty($consignment))
    {
        echo "<h3>Введены НЕ все данные</h3>";
    }
    else
    {
        consignmentins($consignment);
        echo "<script>location.href='index.php?p=2'</script>";
    }
}
if ($m==2)
{
    $idconsignment=$_REQUEST['id'];
    $consignment=$_REQUEST['consignment'];
    if (empty($consignment))
    {
        echo "<h3>Введены НЕ все данные</h3>";
    }
    else
    {
        consignmentupd($idconsignment, $consignment);
        echo "<script>location.href='index.php?p=2'</script>";
    }
}if ($m==3)
{
    $idconsignment=$_REQUEST['id'];
    consignmentdel($idconsignment);
    echo "<script>location.href='index.php?p=2'</script>";
}
