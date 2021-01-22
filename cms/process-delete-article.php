<?php
session_start();
if($_SESSION["userId"]== "1"){

$articleId = $_POST["articleId"];

include('../includes/db-config.php');

$stmt = $pdo->prepare("DELETE FROM `article`
	WHERE `article`.`articleId` = $articleId;");

$stmt->execute();

header("Location: manage-article.php");

} 
else{
include('../includes/admin-else.php');}
?>
