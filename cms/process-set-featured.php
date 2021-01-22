<?php
session_start();
if($_SESSION["userId"]== "1"){

$articleId = $_POST["articleId"];

include('../includes/db-config.php');

$stmt = $pdo->prepare("SELECT * FROM `article`");
$stmt ->execute();
	
 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
    $stmt = $pdo -> prepare ("UPDATE `article` SET `featured` = '0';");
    $stmt->execute();
 }

$stmt = $pdo -> prepare ("UPDATE `article` SET `featured` = '1' WHERE `article`.`articleId` = $articleId;");
$stmt->execute();
header("Location: manage-article.php");

} 
else{
include('../includes/admin-else.php');}
?>
