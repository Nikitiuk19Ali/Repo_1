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
<title>New article</title>
</head>
<body>
<p><a href="index.php">Main</a></p>
<form action="art_loader.php" method="post">
<p><label><strong><H2>Name:</H2></strong><textarea cols="30" name="t1" rows="5"></textarea></label></p>
<p><label><strong><H2>Content:</h2></strong><textarea cols="60" name="t2" rows="30"></textarea></label></p>
<p><input name="submit" type="submit" value="Create" /></p>
</form>
</body>
</html>