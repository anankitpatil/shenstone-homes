<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$comment = $_POST["comment"];
$to = 'anankitpatil@gmail.com';
$subject = 'shenstone-homes.co.uk Contact Form';
$message = 'From: ' . $name . "\r\n" .
	'Email: ' . $email . "\r\n" .
	'Phone: ' . $phone . "\r\n" .
	'Comment: ' . $comment;
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
if(mail($to, $subject, $message, $headers)){
	echo 'Your comment has been mailed successfully.';	
} else{
	echo 'Something went wrong. Please refresh the page and try again.';	
};
?> 