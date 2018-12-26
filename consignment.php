<?php
include_once 'function.php';
$result=consignment();
$numresult= $result->num_rows;
echo
"<table border=1>
<th>Партия</th>
<td colspan=2><a href='index.php?p=21&m=1'>Добавить</a></td>";
for ($i=0;$i<$numresult;$i++)
{
    $row=$result->fetch_assoc();
    $idconsignment=$row['idconsignment'];
    $consignment=$row['consignment'];
    $i1=$i+1;
    echo
    "<tr><td>$consignment</td>
<td><a
href='index.php?p=21&m=2&id=$idconsignment'>Изменить</a></td>
<td><a
href='index.php?p=21&m=3&id=$idconsignment'>Удалить</a></td>";
}
echo
"</table>
<p>Количество записей - $numresult<p>";
