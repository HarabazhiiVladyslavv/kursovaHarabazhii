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

// �������� ������� ������
if(empty($_POST['login'])) exit("������� �����!");
if(empty($_POST['passw'])) exit("������� ������!");
if(strlen($_POST['passw'])<4) exit("���������� �������� � ������ ������ 4!");

$_POST['login'] = trim($_POST['login']);
$_POST['passw'] = trim($_POST['passw']);
$_POST['login'] = mysql_escape_string($_POST['login']);

// ���������, ������� �� � ���� ������ ������� ������ � ����� �������
$query = "SELECT * FROM aut WHERE login LIKE '".$_POST['login']."'";

$ath = mysql_query($query);

if($ath)
{
   if(mysql_num_rows($ath)>0)
   {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Error</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
<a href=users.php>���������</a><br><br>
������ ����� ��� ���������������. ������� ������!
<body>
<html>
<?php

      exit();
   }
}
else
{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Error</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
<a href=users.php>���������</a><br><br>
������ ��� ��������� � ���� ������!
<body>
<html>
<?php

   exit();

}

$_POST['passw'] = md5($_POST['passw']);

$query = "INSERT INTO aut VALUES (0,
                                 '".$_POST['login']."',
                                 '".$_POST['passw']."')";

if(mysql_query($query))
{
   header("Location: ".$_SERVER["HTTP_REFERER"]."");
   exit();
}
else
{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Error</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
</head>
<body>
<a href=password.php>���������</a><br><br>
������ ��� ��������� � ���� ������!
<?php

exit();

}

?>