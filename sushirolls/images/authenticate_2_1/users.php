<?php

/////////////////////////////////////
// PHP Authenticate v2.1           //
// 2006-2011 (C) Яницкий Александр //
// Сайт: janicky.com               //
// E-mail: janickiy@mail.ru        //
// IСQ: 305-972                    //
// MSN: janickiy@live.ru           //
/////////////////////////////////////

// Подключаем базу данных
require "connect.php";

// Модуль авторизации
require "authenticate.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>учетные записи</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
<?php


if(empty($_POST["action"]))
{

?>
<h2>Учетные записи</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table border="1" width="343">
<tr>
<td width="43">Поз.</td>
<td width="102">Логин.</td>
<td width="176">Действие.</td>
</tr>
<?php

   $query = "SELECT * FROM aut";
   $result = mysql_query($query);

   $i=1;

   while($row = mysql_fetch_array($result))
   {

?>
<tr>
<td width="43"><?php echo "".($i++).""; ?></td>
<td width="102"><?=$row['login'] ?></td>
<td width="75"><a href="delete.php?login=<?=$row['login'] ?>">Удалить.</a></td>
</tr>
<?php

   }

?>
</table>
<input type=hidden name=action value=post>
<p><input type="submit" value="Добавить" name=""></p>
</form>
<?php

}
else
{

?>
<h2>Добавленеи новой учетной записи</h2>
<form method="POST" action="add_account.php">
<table border="1" width="275">
<tr>
<td width="80">Логин:</td>
<td width="180"><input type="text" name="login" size="25"></td>
</tr>
<tr>
<td width="80">Пароль:</td>
<td width="180"><input type="text" name="passw" size="25"></td>
</tr>
</table><br>
<input type="submit" value="Добавить">
</form>
<?php

}

?>
</body>
</html>