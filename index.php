<?php
session_start();
include_once('model/startup.php');
include_once('model/M_Users.php');
//  ,   ,  .
startup();
// .
$mUsers = M_Users::Instance();
//  .
$user = $mUsers->Get();
//$user = $mUsers->Get();
// .
header('Content-type: text/html; charset=windows-utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Step1</title>
</head>
<body>
	<h1>Main</h1>
	<ul>
		<li><a href="login.php">Login/Loguot</a></li>
		<li><a href="contact.php">Contacts</a></li>
		<li><a href="new_art.php">Create new article</a></li>
	</ul>
	<? if ($user != null): ?>
		<? echo '<p>Welcome: '.$user['login'].'</p>'?>
	<? endif ?>
	<?
	$result=mysql_query('SELECT * FROM articles');//    
	
while($row=mysql_fetch_array($result))
{
$y = strlen($row['t2']);
if ($y > 150)
{
if ($all = true)
{
$string = $row['t2'] ;
$substring_limited = substr($string,0, 150);        //   0  limit
  $string =  substr($substring_limited, 0, strrpos($substring_limited, ' ' ));    //     0   
  echo '<div> <a href="art_change.php?id='.$row['0'].'">'.$row['t1'].'</a><br></br>'.$string.'...<a href="all_art.php?id='.$row['0'].'">Read more</a><br></br></div>';
 }
 }
 else
  echo '<div> <p><a href="art_change.php?id='.$row['0'].'">'.$row['t1'].'</a><br></br>'.$row['t2'].'</p></div>';
 }
 

?>
</body>
</html>
