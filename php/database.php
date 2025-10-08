<?php
	define('HOST','localhost');
	define('DB_NAME','kards');
	define('USER','root');
	define('PASS','');
	try{
		$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo "Une erreur est survenue.";
		header("Location: fatal_error.php?type=database&error=" . $e);
		echo '<meta http-equiv="refresh" content="0;url=fatal_error.php?error=' . $e . '&type=database">';
		exit();
	}
?>