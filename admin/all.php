<?php
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('agriwash', $connection);
	
$data = mysql_query("SELECT * FROM sh_properties ORDER BY modified DESC") or die(mysql_error());
?>