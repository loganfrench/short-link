<?php
	$key = $_GET['key'];
	if(empty($key)) {
		header('Location: /');
		exit;
	}
	include_once($_SERVER['DOCUMENT_ROOT'].'/config/mysql.php'); 
	
	$query = mysql_fetch_assoc(mysql_query("SELECT `link` FROM `link` WHERE `key` = '".$key."'"));
	if($query['link']) {
		mysql_query("UPDATE `link` SET `views` = `views` + 1 WHERE `key` = '".$key."'");
		header('Location: '.$query['link']);
	}
	else header('Location: /');
	exit;
?>