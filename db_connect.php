<?php
	$host_name = 'localhost';
	$user_name = 'root';
	$password = '';
	$db_name = 'db_news_portal';

	$conn = mysqli_connect($host_name, $user_name, $password, $db_name);
	if(!$conn){
		die('Could not connect'.mysqli_error($conn));
	}
?>