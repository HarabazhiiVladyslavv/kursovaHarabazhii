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
         $error = $error."<li>������� ������ ������� ������!</li>";
      }
   }

   if(empty($_POST["sess_password"]))
   {
      $action = "";
      $error = $error."<li>������� ������� ������!</li>";
   }

   if(empty($_POST["password"]))
   {
      $action = "";
      $error = $error."<li>������ �� ������!</li>";
   }

   if(empty($_POST["password_again"]))
   {
      $action = "";
      $error = $error."<li>������� �������� ������!</li>";
   }

   if(!empty($_POST["password"]) and !empty($_POST["password_again"]))
   {
      if($_POST["password"] != $_POST["password_again"])
      {
         $action = "";
         $error = $error."<li>������ �� ���������!</li>";
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

      // ���������� ������ ������������ ����������
      $password = md5($_POST["password"]);

      // ��������� ������
      $update = "UPDATE aut SET passw='$password' WHERE login='".$_SESSION['login']."'";

      if(mysql_query($update))
      {
         // � ������ ������ ������� ���������
         print "<center>������ ������!</center><br><br>";
      }
      else { print "<center>������ ��� ����� ������!</center><br><br>"; }

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
<p>������� ����� ������.</p>
<table>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<tr><td>������� ������:</td><td><input type="password" name="sess_password" maxlength="50" size="30" value=""></td></tr>
<tr><td>����� ������:</td><td><input type="password" name=password maxlength="50" size="30" value=""></td></tr>
<tr><td>������ ������:</td><td><input type="password" name="password_again" maxlength="50" size="30" value=""></td></tr>
<tr><td>&nbsp;</td><td><input name="action" type="submit" value="�������"></td></tr>
</form>
</table>
<p></p>
<?php

   if(!empty($error))
   {
      print "<p>�� ����� ����� ������ ��������� ��������� ������:</p>";
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
