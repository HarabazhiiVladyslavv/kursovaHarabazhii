<?php

/////////////////////////////////////
// PHP Authenticate v2.1           //
// 2006-2011 (C) ������� ��������� //
// ����: janicky.com               //
// E-mail: janickiy@mail.ru        //
// I�Q: 305-972                    //
// MSN: janickiy@live.ru           //
/////////////////////////////////////

// ���������� ���� ������
require "connect.php";

// ������ �����������
require "authenticate.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>������� ������</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
<?php


if(empty($_POST["action"]))
{

?>
<h2>������� ������</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table border="1" width="343">
<tr>
<td width="43">���.</td>
<td width="102">�����.</td>
<td width="176">��������.</td>
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
<td width="75"><a href="delete.php?login=<?=$row['login'] ?>">�������.</a></td>
</tr>
<?php

   }

?>
</table>
<input type=hidden name=action value=post>
<p><input type="submit" value="��������" name=""></p>
</form>
<?php

}
else
{

?>
<h2>���������� ����� ������� ������</h2>
<form method="POST" action="add_account.php">
<table border="1" width="275">
<tr>
<td width="80">�����:</td>
<td width="180"><input type="text" name="login" size="25"></td>
</tr>
<tr>
<td width="80">������:</td>
<td width="180"><input type="text" name="passw" size="25"></td>
</tr>
</table><br>
<input type="submit" value="��������">
</form>
<?php

}

?>
</body>
</html>