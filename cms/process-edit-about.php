<?php
session_start();
if($_SESSION["userId"]== "1"){
    $aboutText = $_POST["aboutText"];
        $aAText = addslashes ($aboutText);

    include('../includes/db-config.php');

    $stmt = $pdo->prepare("INSERT INTO `about` (`aboutId`, `aboutText`, `time`) VALUES (NULL, '$aAText', current_timestamp());");

    $stmt -> execute();
    
    header("Location: manage-about.php");

} 
else{
include('../includes/admin-else.php');}
?>
