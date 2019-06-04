<?php
/* Main body */
//connect to the DB

	$dsn = 'mysql:host=localhost;dbname=oversurgery';
	$user = 'toxic';
	$password = 'sysop2018';
		
	try {
		$db = new PDO($dsn, $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {

// echo 'Connection failed: ' . $e->getMessage();

		die('Sorry, database problem');
	}

?>