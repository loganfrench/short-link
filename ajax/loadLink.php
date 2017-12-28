<?php
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') exit(':)');
	include_once($_SERVER['DOCUMENT_ROOT'].'/config/mysql.php'); 
	$ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];
	$link = mysql_query("SELECT * FROM `link` WHERE `by` = '".$ip."'");
	$events = array();
	while($row = mysql_fetch_assoc($link)) {
		$events[] = array(
			'id' => intval($row['id']),
			'link' => $row['link'],
			'key' => $row['key'],
			'views' => intval($row['views']),
			'created' => date('d.m.Y H:i:s', $row['created'])
		);
	}
	exit(json_encode($events));
	
?>