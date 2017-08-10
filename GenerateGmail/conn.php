<?php

$conn = @mysql_connect('localhost','root','root');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_query('SET NAMES UTF8');
mysql_query('set character_set_client = utf8');
mysql_query('set character_set_results = utf8');
mysql_select_db('orders', $conn);

?>