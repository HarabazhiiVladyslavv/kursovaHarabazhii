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

if($_GET['login'] == $_SESSION['login'])
{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
<a href=users.php>���������</a><br>
�� �� ������ ������� ������� ������ ��� ������� ����������!
</body>
</html>
<?php

   exit();
}
else
{
   $delete = "DELETE FROM aut WHERE login='".$_GET['login']."'";

   if(mysql_query($delete))
   {
      // ������������ �������������� ������� �� �������� �����������������
      header("Location: ".$_SERVER["HTTP_REFERER"]."");
      exit();
   }
   else
   {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
������ ��� ��������� � ���� ������!
</body>
</html>
<?php

   }
}

?>