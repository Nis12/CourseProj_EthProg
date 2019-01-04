<?php
include_once 'function.php';
$m=$_REQUEST['m'];
if ($m==1)
{
    echo "<h2>Добавить Партию</h2>
<form action='index.php' method=post>
<input type='hidden' name='m' value=1>
<input type='hidden' name='p' value=22>
<table class='table'>
<tr>
<th>Партия</th>
<td><input type='text' class='form-control' name='consignment'></td>
</tr>
<tr><td colspan=2 align=center><button type='submit' class='submit'>Сохранить</button></td>
</tr>
</table>
</form>";
}
if ($m==2)
{
    $idconsignment=$_REQUEST['id'];
    $result=consignmentid($idconsignment);
    $row=$result->fetch_assoc();
    $consignment=$row['consignment'];
    echo "<h2>Изменить партию</h2>
<form action='index.php' method=post>
<input type='hidden' name='m' value=2>
<input type='hidden' name='id' value=$idconsignment>
<input type='hidden' name='p' value=22>
<table class='table'>
<tr>
<th>Партия</th>
<td><input type='text' class='form-control' name='consignment' value='$consignment'></td>
</tr>
<tr>
<td colspan=2 align=center><button type='submit' class='submit'>Сохранить</button></td>
</tr>
</table>
</form>";
}
if ($m==3)
{
    $idconsignment=$_REQUEST['id'];

    echo "<h2>Удалить партию?</h2>
<form action='index.php' method=post>
<input type='hidden' name='m' value=3>
<input type='hidden' name='id' value=$idconsignment>
<input type='hidden' name='p' value=22>
<table class='table'>
<tr>
<td align=center><button type='submit' class='submit'>Да</button></td>
</tr>
</table>
</form>";
}