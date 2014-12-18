<?php 
define("UPLOAD_DIR", "/Applications/XAMPP/xamppfiles/htdocs/shenstone-homes/uploads/");
if(isset($_REQUEST))
{
	$connection = mysql_connect('localhost', 'root', '');
	mysql_select_db('agriwash', $connection);
	error_reporting(E_ALL && ~E_NOTICE);
	
	$title = $_POST['title'];
	$content = mysql_real_escape_string($_POST['content']);
	$price = $_POST['price'];
	$names = array();
	
	for($i = 1; $i <= 5; $i++){
		$image = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['image_'.$i]['name']);
		
		if (isset($_FILES['image_'.$i]['error']) && $_FILES['image_'.$i]['error'] == 0)
		{ 
			if (file_exists(UPLOAD_DIR . $fileName['name']))
			{echo 'hhdfasfadsf';
				$name = pathinfo($_FILES['image_'.$i]['name'], PATHINFO_FILENAME);
				$extension = pathinfo($_FILES['image_'.$i]['name'], PATHINFO_EXTENSION);
				$increment = '';
				while(file_exists(UPLOAD_DIR . $name . $increment . '.' . $extension)) {
					$increment++;
				}
				$basename = $name . $increment . '.' . $extension;
				move_uploaded_file($_FILES['image_'.$i]['tmp_name'], UPLOAD_DIR . $basename);
				$names[$i] = $basename;
			} else {
				$names[$i] = $_FILES['image_'.$i]['name'];
				if(move_uploaded_file($_FILES['image_'.$i]['name'], UPLOAD_DIR.$_FILES['image_'.$i]['name'])){echo $names[$i];};
				
			}
		}
	}
	
	$sql = "INSERT INTO sh_properties (title, price, content, image_1, image_2, image_3, image_4, image_5) VALUES ('$title', '$price', '$content', '$names[1]', '$names[2]', '$names[3]', '$names[4]', '$names[5]')";
	$result = mysql_query($sql);
	if($result){
		echo "Property added.";
	}	
}
?>