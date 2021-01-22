<?php
session_start();
$fName = $_POST["fName"];
    $aFName = addslashes ($fName);
$lName = $_POST["lName"]; 
    $aLName = addslashes ($lName);
$email = $_POST["email"];
$catInId0 = $_POST["catInId0"];
$catInId1 = $_POST["catInId1"];
$catInId2 = $_POST["catInId2"];
$catInId = array($catInId0,$catInId1,$catInId2);
$roleId = $_POST["roleId"];
$time= $_POST["time"];

include('includes/db-config.php');
$stmt = $pdo->prepare ("INSERT INTO `contact` (`contactId`, `fName`, `lName`, `email`, `roleId`, `time`) VALUES (NULL, '$aFName', '$aLName', '$email', '$roleId', '$time');");
$stmt->execute();

$stmt = $pdo->prepare ("SELECT * FROM `contact` WHERE `contactId`= LAST_INSERT_ID()");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$contactId = $row["contactId"];

for ($i=0; $i<3; $i++) {
     if($catInId[$i]){
                $catInValue=$i+1;
                $stmt = $pdo -> prepare ("INSERT INTO `contact-catin`(`contactId`, `catInId`) VALUES ('$contactId', '$catInValue');");
        $stmt -> execute();}
    }

$process->success = true;
$json = json_encode($process);
echo($json);

?>