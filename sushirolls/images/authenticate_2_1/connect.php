<?php

/////////////////////////////////////
// PHP Authenticate v2.1           //
// 2006-2011 (C) Яницкий Александр //
// Сайт: janicky.com               //
// E-mail: janickiy@mail.ru        //
// IСQ: 305-972                    //
// MSN: janickiy@live.ru           //
/////////////////////////////////////

// Настройки базы данных
$dblocation = "localhost"; //хост базы данных
$dbname = "aut";           //имя базы данных
$dblogin = "root";         //логин для базы данных
$dbpasswd = "";            //пароль для базы данных

// Устанавливаем соединение с базой данных
$dbconnect = mysql_connect($dblocation, $dblogin, $dbpasswd) or die(mysql_error());
@mysql_select_db($dbname) or die(mysql_error());

?>