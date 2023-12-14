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

$action = "";
$error = "";
$action = $_POST["action"];

if(!empty($action))
{
   $_POST["password"] = trim($_POST["password"]);
   $_POST["sess_password"] = trim($_POST["sess_password"]);
   $_POST["password_again"] = trim($_POST["password_again"]);

   if(!empty($_POST["sess_password"]))
   {
      $sess_password = md5($_POST["sess_password"]);

      $query = "SELECT passw FROM aut WHERE login='".$_SESSION['login']."'";
      $result = mysql_query($query);

      $aut = mysql_fetch_array($result);

      if($aut['passw'] != $sess_password)
      {
         $action = "";
         $error = $error."<li>Неверно введен текущий пароль!</li>";
      }
   }

   if(empty($_POST["sess_password"]))
   {
      $action = "";
      $error = $error."<li>Введите текущий пароль!</li>";
   }

   if(empty($_POST["password"]))
   {
      $action = "";
      $error = $error."<li>Пароль не введен!</li>";
   }

   if(empty($_POST["password_again"]))
   {
      $action = "";
      $error = $error."<li>Введите повторно пароль!</li>";
   }

   if(!empty($_POST["password"]) and !empty($_POST["password_again"]))
   {
      if($_POST["password"] != $_POST["password_again"])
      {
         $action = "";
         $error = $error."<li>Пароли не совпадают!</li>";
      }
   }

   if(empty($error))
   {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<?php

      // Подвергаем пароль необратимому шифрованию
      $password = md5($_POST["password"]);

      // Формируем запрос
      $update = "UPDATE aut SET passw='$password' WHERE login='".$_SESSION['login']."'";

      if(mysql_query($update))
      {
         // В случае успеха выводим сообщение
         print "<center>Пароль сменен!</center><br><br>";
      }
      else { print "<center>Ошибка при смене пароля!</center><br><br>"; }

?>
</body>
</html>
<?php

   }
}

if(empty($action))
{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<p>Введите новый пароль.</p>
<table>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<tr><td>Текущий пароль:</td><td><input type="password" name="sess_password" maxlength="50" size="30" value=""></td></tr>
<tr><td>Новый пароль:</td><td><input type="password" name=password maxlength="50" size="30" value=""></td></tr>
<tr><td>Повтор пароля:</td><td><input type="password" name="password_again" maxlength="50" size="30" value=""></td></tr>
<tr><td>&nbsp;</td><td><input name="action" type="submit" value="сменить"></td></tr>
</form>
</table>
<p></p>
<?php

   if(!empty($error))
   {
      print "<p>Во время смены пароля произошли следующие ошибки:</p>";
      print "<ul>";
      print $error;
      print "</ul><br><br>";
   }

?>
</body>
</html>
<?php

}

?>
