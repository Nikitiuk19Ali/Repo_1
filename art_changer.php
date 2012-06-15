<?php
//error_reporting(E_ALL);
include_once('model/startup.php');
include_once('model/MSQL.php');
startup();
//$result = mysql_query("SELECT * FROM articles WHERE id=$id");      // делаем выборку из таблицы
//$row=mysql_fetch_array($result);
//$T1 = $row['t1'];
//$T2 = $row['t2'];
$id = mysql_real_escape_string ($_POST['id']);
$t1 = mysql_real_escape_string ($_POST['t1']);
$t2 = mysql_real_escape_string ($_POST['t2']);
//if($T1 != $_POST['t1'] || $T1 != $_POST['t2'])
//{
   // $table = 'articles';		                                // имя таблицы
	// $object = array(t1 => '$t1', t2 =>'$t2'); 		// ассоциативный массив с парами вида "имя столбца - значение"
	 //$where = 'id = '$id'';		                            // условие (часть SQL запроса)
	 //$msql = MSQL::Instance();
	 //$result = $msql -> new Update($table, $object, $where);
	// print_r($_POST);
     $result1 = mysql_query("UPDATE `articles` SET `t1`='$t1', `t2`='$t2' WHERE `id`=$id") or die(mysql_error());
    	if ($result1 = true) {
                echo "<div align=center><H3>You have successfully changed the article</H3><a href='index.php'>Main</a> </div><br>";
                } 
				else 
                echo "<div align=center>Can not save data into the database! <a href='Login.php'>Login</a> </div><br>";
		
