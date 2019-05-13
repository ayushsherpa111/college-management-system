<?php 
	$server = '127.0.0.1';
	$username = 'root';
	$password = '';

	//The name of the schema we created earlier in MySQL workbench
	$schema = 'woodland';
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	session_start();
?>