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

// Проверка веденых данных
if(empty($_POST['login'])) exit("Введите логин!");
if(empty($_POST['passw'])) exit("Введите пароль!");
if(strlen($_POST['passw'])<4) exit("Количество символов в пароле меньше 4!");

$_POST['login'] = trim($_POST['login']);
$_POST['passw'] = trim($_POST['passw']);
$_POST['login'] = mysql_escape_string($_POST['login']);

// Проверяем, имеется ли в базе данных учетная запись с таким логином
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
<a href=users.php>Вернуться</a><br><br>
Данный логин уже зарегистрирован. Введите другой!
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
<a href=users.php>Вернуться</a><br><br>
Ошибка при обращении к базе данных!
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
<a href=password.php>Вернуться</a><br><br>
Ошибка при обращении к базе данных!
<?php

exit();

}

?>