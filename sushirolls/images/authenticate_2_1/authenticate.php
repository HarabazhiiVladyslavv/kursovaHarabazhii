<?php

/////////////////////////////////////
// PHP Authenticate v2.1           //
// 2006-2011 (C) ������� ��������� //
// ����: janicky.com               //
// E-mail: janickiy@mail.ru        //
// I�Q: 305-972                    //
// MSN: janickiy@live.ru           //
/////////////////////////////////////

// �������� ������
session_start();

// e-mail ��������������
$mail = "admin@mysite.ru";

$_POST['login'] = trim($_POST['login']);
$_POST['password'] = trim($_POST['password']);

if(!get_magic_quotes_gpc())
{
   $_POST['login'] = mysql_escape_string($_POST['login']);
}

if(!empty($_POST['admin']))
{
   if(empty($_POST['login'])) exit("������� �����!");
   if(empty($_POST['password'])) exit("������� ������!");

   // ��������� ����� � ������ �� ���� ������
   $query = "SELECT * FROM aut WHERE login='".$_POST['login']."'";
   $result = mysql_query($query);

   if($result) { $aut = mysql_fetch_array($result); }

   if($_SESSION['sess_admin'] != "ok")
   {
      $_SESSION['login'] = $_POST['login'];
   }

   $hash = md5($_POST['password']);

   if($hash == $aut['passw'])
   {
      $_SESSION['sess_admin'] = "ok";
      $_SESSION['login'] = $aut['login'];

      // ������ � ���
      $query = "INSERT INTO log VALUES (0,
                                       '".$_POST['login']."',
                                       '".$_SERVER['REMOTE_ADDR']."',
                                       NOW())";
      mysql_query($query);
   }
   else
   {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<title>������ �����������!</title>
</head>
<body>
<script type='text/javascript'>
window.alert('��������, �� �� �� ������ �����������.\n������ ������!');
window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>';
</script>
</body>
</html>
<?php

      exit();
   }
}
else
{
   if(isset($_SESSION['no_access']))
   {
      if($_SESSION['sess_admin'] != "ok")
      {
         // ������������ ���������� ��������� ������� �����������
         $_SESSION['no_access']++;

         // ���� ���������� ��������� ������� �������� ������������ ����������,
         // �� ���������� ����������� �� ���������� �����
         if($_SESSION['no_access'] == 4 AND $mail)
         {
            $headers = "Content-Type: text/plain; charset=windows-1251\n";
            $headers .= "From: admin@".$_SERVER['SERVER_NAME']."\n";
            $headers .= "X-Priority: 1\r\n";

            if(empty($_SERVER['HTTP_REFERER'])) { $msg = "������� ������ ".$_SERVER['SERVER_NAME']."!\n\n����������� ������� �������������������� ������� ".date("d.m.Y �. � G:i:s").".\n������ � ����������:\nip - ".$_SERVER['REMOTE_ADDR']."\n������� - ".$_SERVER['HTTP_USER_AGENT']; }
            else { $msg = "������� ������ ".$_SERVER['SERVER_NAME']."!\n\n����������� ������� �������������������� ������� �� ���������� ������� ".date("d.m.Y �. � G:i:s").".\n������ � ����������:\nip - ".$_SERVER['REMOTE_ADDR']."\n������� - ".$_SERVER['HTTP_USER_AGENT']."\n������� - ".$_SERVER['HTTP_REFERER']; }

            @mail($mail, "������� ������ ".$_SERVER['SERVER_NAME']."!", $msg, $headers);

            exit();
         }

         // ���� ����� ��������� ������� ������ ������� ����������, �� ��������� ��������� ����������� �������
         if($_SESSION['no_access'] < 4)
         {
            ShowAdmin();
         }

         // ���� ����� ��������� ������� ��������� �����������, �� �������� ��������� ��������� �����������
         if($_SESSION['no_access'] > 4)
         {
            exit();
         }
      }
   }
   else
   {
      if($_SESSION['sess_admin'] != "ok")
      {
         $_SESSION['no_access'] = 1;
         ShowAdmin();
      }
   }
}

function ShowAdmin()
{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<title>�����������</title>
<head>
<body>
<style type="text/css">

.block-on-center {
position: absolute;
top: 50%;
left: 50%;
margin-top: -100px;
margin-left: -100px; }

.aut {
width: 300px;
background-color: #EEEEEE;
border-top-style: solid;
border-top-width: 1px;
border-bottom-style: solid;
border-bottom-width: 1px;
border-left-width: 1px;
border-left-style: solid;
border-right-width: 1px;
border-right-style: solid;
border-top-color: #1D6499;
border-left-color: #1D6499;
border-right-color: #1D6499;
border-bottom-color: #1D6499; }

.button{ border-width: 1px; color: #2B452A }

</style>
<div class="block-on-center">
<div class="aut">
<form method="post">
<table cellspacing="2" cellpadding="4" border="0">
<tr>
<td width="150">�����:</td>
<td width="150"><input type="text" name="login" size="20"></td>
</tr>
<tr>
<td width="150">������:</td>
<td width="150"><input type="password" name="password" size="20"></td>
</tr>
<tr>
<td width="300" colspan="2" valign="middle">
<input type="submit" name="admin" class=button value=" OK ">
</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
<?php

   exit();
}

?>