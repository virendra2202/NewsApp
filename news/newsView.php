<?php
include 'config.php';

$sql = "SELECT news_id,news_title,news_picture,news_description FROM news_details where news_id='".$_GET['id']."'";

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