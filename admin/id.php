<?php
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('shenstone-homes', $connection);

$id = $_GET['id'];
	
$data = mysql_query("SELECT id, title, price, content, image_1, image_2, image_3, image_4, image_5 FROM properties WHERE id = '$id'") or die(mysql_error());
$row = mysql_fetch_row($data);

$data = array('id' => $row[0], 'title' => $row[1], 'price' => $row[2], 'content' => $row[3], 'image_1' => $row[4], 'image_2' => $row[5], 'image_3' => $row[6], 'image_4' => $row[7], 'image_5' => $row[8]);
print json_encode($data);
?>