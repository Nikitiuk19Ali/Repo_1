<?php
session_start();
include_once('model/startup.php');
include_once('model/M_Users.php');

// Установка параметров, подключение к БД
startup();
// Менеджеры.
$mUsers = M_Users::Instance();

// Очистка старых сессий.
$mUsers->ClearSessions();

// Текущий пользователь.
$user = $mUsers->Get();

// Если пользователь не зарегистрирован - отправляем на страницу регистрации.
if ($user == null)
{
	header("Location: login.php");
	die();
}
// Кодировка.
header('Content-type: text/html; charset=windows-utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Article</title>
</head>
<body>
	<p><a href="index.php">Main</a></p>
	<?
	$result=mysql_query('SELECT * FROM articles');// делаем выборку из таблицы
	
$row=mysql_fetch_array($result);
  echo '<div><p><a href="art_change.php?id='.$row['0'].'">'.$row['t1'].'</a><br></br>'.$row['t2'].'ss</p></div>';

 

?>
</body>
</html>
