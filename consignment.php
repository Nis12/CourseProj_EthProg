<?php
session_start();
include_once 'function.php';
$result=consignment();
$numresult= $result->num_rows;
echo
"<table class='table' style='width: auto'>
<thread><tr>
<th>Партия</th>";
if ($_SESSION['admin'] > 0) echo "
<th colspan=2><a href='index.php?p=21&m=1' class='knopka' style='margin-left: 27%'>Добавить</a></th>
</tr></thread>";
for ($i=0;$i<$numresult;$i++)
{
    $row=$result->fetch_assoc();
    $idconsignment=$row['idconsignment'];
    $consignment=$row['consignment'];
    $i1=$i+1;
    echo
    "<tbody><tr/><td>$consignment</td>";
    if ($_SESSION['admin'] > 0)
    echo "
<th><a
href='index.php?p=21&m=2&id=$idconsignment' class='knopka'>Изменить</a></th>
<th><a
href='index.php?p=21&m=3&id=$idconsignment' class='knopka'>Удалить</a></th>";
}
echo
"</tbody></table>
<p>Количество записей - $numresult<p>";
