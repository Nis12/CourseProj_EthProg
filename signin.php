<?php
if ($_REQUEST['in']==0)
{
echo "
<h3>Учетная запись администратора</h3>
<form action='index.php' method=post>
<input type='hidden' name='p' value=31>
<table border=0 class='table'>
<tr>
<th>Логин: </th>
<td><input type='text' class='form-control' name='login'></td>
</tr>
<tr>
<th>Пароль: </th>
<td><input type='text' class='form-control' name='password'></td>
</tr>
<tr>
<td colspan=2 align=center><button type='submit' class='submit'>Войти</button></td>
</tr>
</table>
</form>";
} elseif ($_REQUEST['in'] == 1) {
    echo "
<h2>Выйти из учетной записи?</h2>
<form action='index.php' method=post>
    <input type='hidden' name='in' value=1>
    <input type='hidden' name='p' value=31>
    <table class='table'>
        <tr>
            <td align=center><button type='submit' class='submit'>Да</td>
        </tr>
    </table>
</form>";
}