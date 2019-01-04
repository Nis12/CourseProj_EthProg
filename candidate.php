<?php
include_once 'function.php';
$result=candidate();
$numresult= $result->num_rows;
echo
"
<table class='table' style='width: auto'>
<thread>
<tr>
<th>Партия</th>
<th>ФИО кандидата</th>
<th>Должность</th>
<th>Возраст</th>
<th>В браке</th>
<th colspan=2><a href='index.php?p=11&m=1' class='knopka' style='margin-left: 27%'>Добавить</a></th>
</tr>
</thread>
<tbody>";

for ($i=0;$i<$numresult;$i++)
{
    $row=$result->fetch_assoc();
    $idcandidate=$row['idcandidate'];
    $fiocandidate=$row['fiocandidate'];
    $idconsignment=$row['idconsignment'];
    $consignment=$row['consignment'];
    $position = $row['position'];
    $age=$row['age'];
    $married=$row['married'];
    $i1=$i+1;
    echo
    "<tr><td>$consignment</td>
<td>$fiocandidate</td>
<td>$position</td>
<td>$age</td>
<td>";
if ($married) echo "Да"; else echo "Нет";
echo
"</td>
<th><a href='index.php?p=11&id=$idcandidate&m=2' class='knopka'>Изменить</a></th>
<th><a href='index.php?p=11&id=$idcandidate&m=3' class='knopka'>Удалить</a></th>";
}
echo "</tr></tbody></table>
<p>Количество записей - $numresult";
