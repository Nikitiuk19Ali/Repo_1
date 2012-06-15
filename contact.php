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
<title>Contacts</title>
</head>
<body>
	<h1>Contact information of  employees</h1>
	<p><a href="index.php">Main</a></p>
	<ul>
		<li>Ivanov, (926) 123-45-67</li>
		<li>Petrov, (925) 112-83-83</li>
		<li>Zamuruev, (916) 523-15-61</li>
		<li>Semenova, (903) 323-44-66</li>		
	</ul>
</body>
</html>
