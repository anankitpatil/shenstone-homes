<?php 
define("UPLOAD_DIR", "/Applications/XAMPP/xamppfiles/htdocs/shenstone-homes/uploads/");
if(isset($_POST['id']))
{
	$connection = mysql_connect('localhost', 'root', '');
	mysql_select_db('shenstone-homes', $connection);
	error_reporting(E_ALL && ~E_NOTICE);
	
	$id = $_POST['id'];
	$query = "DELETE FROM properties WHERE id=$id";
	$getquery = "SELECT * FROM properties WHERE id=$id LIMIT 1";
	$temp = mysql_query($getquery);
	while($news = mysql_fetch_array($temp)) { 
		for($i = 1; $i <= 5; $i++) {
			$imagedelete = $news['image_'.$i];
			if($imagedelete){
				unlink(UPLOAD_DIR . $imagedelete);
			}
		}
	}
	$result=mysql_query($query);
	if($result){
		echo $temp['image'];
	}	
}
?>