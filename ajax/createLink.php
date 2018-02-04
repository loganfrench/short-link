<?php
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') exit(':)');
	include_once($_SERVER['DOCUMENT_ROOT'].'/config/mysql.php'); 
	
	$link = mysql_escape_string($_POST['link']);
	$link = trim($_POST['link']);
	if(empty($link)) exit(json_encode(array('status' => false, 'code' => 'Неверная ссылка')));
	if(!preg_match('^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$^', $link)) exit(json_encode(array('status' => false, 'code' => 'Неверная ссылка')));
	
	$ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];
	
	$check = mysql_fetch_array(mysql_query("SELECT `key` FROM `link` WHERE `link` = '".$link."' AND `by` = '".$ip."'"))[0];
	if($check) exit(json_encode(array('status' => false, 'dbl' => true, 'link' => $check, 'code' => 'Дублирующая ссылка')));
	
	do {
		for ($i = 0; $i < rand(2, 6); $i++) $key .= substr('ABDEFGHKNQRSTYZ123456789', rand(1, 24)-1, 1);
	}
	while(mysql_num_rows(mysql_query("SELECT * FROM `link` WHERE `key` = '".$key."'")) > 0);
	
	if(mysql_query("INSERT INTO `link` (`link`, `key`, `by`, `created`) VALUES ('".$link."', '".$key."', '".$ip."', '".time()."')")) die(json_encode(array('status' => true, 'link' => "http://".$_SERVER['SERVER_NAME']."/".$key, 'created' => date('d.m.Y H:i:s'))));
	else exit(json_encode(array('status' => false, 'code' => mysql_error())));
?>
