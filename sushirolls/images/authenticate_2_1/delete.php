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
<a href=users.php>Вернуться</a><br>
Вы не можете удалить учетную запись под которой находитесь!
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
      // Осуществляем автоматический переход на страницу администрирования
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
Ошибка при обращении к базе данных!
</body>
</html>
<?php

   }
}

?>