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
<title>All article</title>
</head>
<body>
	   <?php   
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM articles WHERE id='$id'");// делаем выборку из таблицы
$row = mysql_fetch_array($result);
$t1 =  $row['t1'];
$t2 = $row['t2'];
$result=mysql_query('SELECT * FROM articles');// делаем выборку из таблицы
?>
<p><a href="index.php">Main</a></p>
<div>
<form action="art_changer.php" method="post">
<p><label><strong>Name:<br></br></strong><textarea cols="30" name="t1" rows="5" ><?php echo $t1?></textarea></label></p>
<p><label><strong>Content:<br></br></strong><textarea cols="60" name="t2" rows="30"><?php echo $t2?></textarea></label></p>
<p><input name="id" type="hidden" value="<? echo $id ?>" /></p>
<p><input name="submit" type="submit" value="Change" /></p>
</form>
</div>
</body>
</html>
