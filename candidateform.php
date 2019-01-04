<?php
include_once 'function.php';
$m=$_REQUEST['m'];
if ($m==1)
{
    echo "<h2>Добавить кандидата</h2>
<form action='index.php' method=post>
<input type='hidden' name='m' value=1>
<input type='hidden' name='p' value=12>
<table class='table'>
<tr>
<th>ФИО кандидата</th>
<td><input type='text' class='form-control' name='fiocandidate'></td>
</tr>
<tr>
<th>Должность</th>
<td><input type='text' class='form-control' name='position'></td>
</tr>
<tr>
<th>Возраст</th>
<td><input type='text' class='form-control' class='form-control' name='age'></td>
</tr>
<tr>
<th>В браке</th>
<td>
<label class='radio-inline'><input type='radio' value='0' name='married' checked>Нет</label>
<label class='radio-inline'><input type='radio' value='1' name='married'>Да</label>
</td>
</tr>
<th>Партия</th><td>
<select class='form-control' name='idconsignment'>
<option selected value='0'>Не выбрано</option>";
    $result=consignment();
    $numresult= consignment()->num_rows;
    for ($i=0;$i<$numresult;$i++)
    {
        $row=$result->fetch_assoc();
        $idconsignment=$row['idconsignment'];
        $consignment=$row['consignment'];
        echo
        "<option value='$idconsignment'>$consignment</option>";
    }
    echo
    "</select></td></tr>
<tr>
<td colspan=2 align=center><button class='submit' type='submit' >Сохранить</button></td>
</tr>
</table>
</form>";
}
if ($m==2)
{
    $idcandidate=$_REQUEST['id'];
    $result=candidateid($idcandidate);
    $row=$result->fetch_assoc();
    $fiocandidate=$row['fiocandidate'];
    $age=$row['age'];
    $idconsignmentsel=$row['idconsignment'];
    $position=$row['position'];
    $married=$row['married'];
    echo "<h2>Изменить данные о кандидате</h2>
<form action='index.php' method=post>
<input type='hidden' name='m' value=2>
<input type='hidden' name='id' value=$idcandidate>
        <input type='hidden' name='p' value=12>
<table class='table'>
<tr>
<th>ФИО кандидата</th>
<td><input type='text' class='form-control' name='fiocandidate' value='$fiocandidate'></td>
</tr>
<tr>
<th>Должность</th>
<td><input type='text' class='form-control' name='position' value='$position'></td>
</tr>
<tr>
<th>Возраст</th>
<td><input type='text' class='form-control' name='age' value=$age></td>
</tr>
<tr>
<th>В браке</th>
<td>";
   if ($married) {
       echo "
<label class='radio-inline'><input type='radio' value='0' name='married'>Нет</label>
<label class='radio-inline'><input type='radio' value='1' name='married' checked>Да</label>
";
   } else {
       echo "
<label class='radio-inline'><input type='radio' value='0' name='married' checked>Нет</label>
<label class='radio-inline'><input type='radio' value='1' name='married'>Да</label>
";
   }
    echo
    "</td>
</tr>
<th>Партия</th><td>
<select class='form-control' name='idconsignment'>
<option value='0'>Не выбрано</option>";
    $result=consignment();
    $numresult= consignment()->num_rows;
    for ($i=0;$i<$numresult;$i++)
    {
        $row=$result->fetch_assoc();
        $idconsignment=$row['idconsignment'];
        $consignment=$row['consignment'];
        if ($idconsignmentsel==$idconsignment)
            echo "<option value='$idconsignment' selected>$consignment</option>";
        else
            echo "<option value='$idconsignment'>$consignment</option>";
    }
    echo
    "</select></td></tr>
<tr>
<td colspan=2 align=center><button type='submit' class='submit'>Сохранить</button></td>
</tr>
</table>
</form>";
}
if ($m==3)
{
    $idcandidate=$_REQUEST['id'];
    echo "<h2>Удалить кандидата?</h2>
<form action='index.php' method=post>
<input type='hidden' name='m' value=3>
<input type='hidden' name='id' value=$idcandidate>
<input type='hidden' name='p' value=12>
<table class='table'>
<tr>
<td align=center><button type='submit' class='submit'>Да</button></td>
</tr>
</table>
</form>";
}