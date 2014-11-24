<?php
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('shenstone-homes', $connection);
	
$data = mysql_query("SELECT * FROM properties ORDER BY modified DESC") or die(mysql_error());
?>