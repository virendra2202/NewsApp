<?php
include 'config.php';

$sql = "SELECT DISTINCT news_city FROM news_details";

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->query($sql);  
	$news = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	//echo '{"items":'. json_encode($news) .'}'; 
	header('contentType: application/javascript');
	print $_GET["callback"]."(". json_encode($news) .");";
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>