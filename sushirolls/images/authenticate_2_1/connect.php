<?php

/////////////////////////////////////
// PHP Authenticate v2.1           //
// 2006-2011 (C) ������� ��������� //
// ����: janicky.com               //
// E-mail: janickiy@mail.ru        //
// I�Q: 305-972                    //
// MSN: janickiy@live.ru           //
/////////////////////////////////////

// ��������� ���� ������
$dblocation = "localhost"; //���� ���� ������
$dbname = "aut";           //��� ���� ������
$dblogin = "root";         //����� ��� ���� ������
$dbpasswd = "";            //������ ��� ���� ������

// ������������� ���������� � ����� ������
$dbconnect = mysql_connect($dblocation, $dblogin, $dbpasswd) or die(mysql_error());
@mysql_select_db($dbname) or die(mysql_error());

?>