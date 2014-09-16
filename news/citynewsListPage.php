<?php
include 'config.php';

$sql = "SELECT * FROM news_details where news_city='".$_GET['city']."'";

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