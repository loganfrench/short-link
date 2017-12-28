<?php
	define('M_HOST', 'localhost');
	define('M_USER', 'root');
	define('M_PASS', ''); 
	define('M_BASE', 'shrt_link');
	
	if(!@mysql_connect(M_HOST,M_USER,M_PASS)) die('Ошибка #'.mysql_errno().'.<br>#'.mysql_error());
	mysql_select_db(M_BASE);
	mysql_query("set character_set_client='utf8'");
	mysql_query("set character_set_results='utf8'");
	mysql_query("set collation_connection='utf8_general_ci'");
?>