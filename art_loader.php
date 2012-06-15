<?php
include_once('model/startup.php');
//include_once('model/MSQL.php');
// Установка параметров, подключение к БД, запуск сессии.
startup();

if (isset($_POST['t1'])) { $t1 = $_POST['t1']; if ($t1 == '') { unset($t1);} }
if (isset($_POST['t2'])) { $t2 = $_POST['t2']; if ($t2 == '') { unset($t2);} } 
$t1 = mysql_real_escape_string($t1);
$t2 = mysql_real_escape_string($t2);

 //заносим введенный пользователем Материал в переменную $t1 и $t2, если они пусты, то уничтожаем переменные
 
 if (empty($t1) or empty($t2)) //если пользователь не ввел даные, то выдаем ошибку и останавливаем скрипт
        exit ("You have not entered all the information, go back and fill in all fields!");
    	else
		{
		$result = mysql_query("INSERT INTO articles (t1, t2) VALUES('$t1','$t2')");
		//$msql = MSQL::Instance();
		//$table = 'articles';
	// $object = array(' '$t1', '$t2' '); 
	 //$field = array('t1, t2'); 
		// $insrt = $msql ->Insert($table, $object,$field);
		 if ($result == 'true')
{
	echo "<H3>You have successfully created the article</H3><a href='index.php'>Main</a>";
	
	
}
}
	
