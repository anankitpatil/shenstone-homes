<?php 
define("UPLOAD_DIR", "/Applications/XAMPP/xamppfiles/htdocs/shenstone-homes/uploads/");
if(isset($_REQUEST))
{
	$connection = mysql_connect('localhost', 'root', '');
	mysql_select_db('shenstone-homes', $connection);
	error_reporting(E_ALL && ~E_NOTICE);
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = mysql_real_escape_string($_POST['content']);
	$price = $_POST['price'];
	$names = array();
	$img = 0;
	
	for($i = 1; $i <= 5; $i++){
		$image = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['image_'.$i]['name']);
		
		if (isset($_FILES['image_'.$i]['error']) && $_FILES['image_'.$i]['error'] == 0)
		{
			unlink(UPLOAD_DIR . $fileName['name']);
			if (file_exists(UPLOAD_DIR . $fileName['name']))
			{
				$name = pathinfo($_FILES['image_'.$i]['name'], PATHINFO_FILENAME);
				$extension = pathinfo($_FILES['image_'.$i]['name'], PATHINFO_EXTENSION);
				$increment = '';
				while(file_exists(UPLOAD_DIR . $name . $increment . '.' . $extension)) {
					$increment++;
				}
				$basename = $name . $increment . '.' . $extension;
				move_uploaded_file($_FILES['image_'.$i]['tmp_name'], UPLOAD_DIR . $basename);
				$names[$i] = ", image_".$i." = '$basename'";
			}
			$img = 1;
		} else { $names[$i] = ''; }
	}
	
	if($img == 1){
		$sql = "UPDATE properties SET title = '$title', price = '$price', content = '$content' $names[1] $names[2] $names[3] $names[4] $names[5] WHERE id = '$id'";
	} else {
		$sql = "UPDATE properties SET title = '$title', price = '$price', content = '$content' WHERE id = '$id'";
	}
	echo $sql;
	
	$result = mysql_query($sql);
	if($result){
		echo "Property item updated successfully.";
	}	
}
?>