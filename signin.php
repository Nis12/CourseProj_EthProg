<?php
echo "<h3>Учетная запись администратора</h3> 
<form action='index.php' method=post>
<input type='hidden' name='p' value=31>
<table border=0>
<tr>
<th>Логин: </th>
<td><input type='text' name='login'></td>
</tr>
<tr>
<th>Пароль: </th>
<td><input type='text' name='password'></td>
</tr>
<tr>
<td colspan=2 align=center><input type='submit' value='Войти'></td>
</tr>
</table>
</form>";