<?php
session_start();
if(isset($_SESSION["personId"])){
    
    $personId = $_SESSION["personId"];
    $like = $_POST["like"];
    $articleId = $_GET["articleId"];

    // echo($personId);
    // echo($like);
    // echo($articleId);

    include('../includes/db-config.php');
    
    $stmt = $pdo->prepare("SELECT * FROM `person-article` WHERE (`personId`= $personId AND `articleId`=$articleId);");
    $stmt->execute();
    $entries=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             $entries +=1;}
 
    if ($entries>1){
            $stmt = $pdo->prepare("DELETE FROM `person-article` WHERE (`personId`= $personId AND `articleId`=$articleId);");
            $stmt->execute();
            $stmt = $pdo->prepare("INSERT INTO `person-article` (`personId`, `articleId`, `like`) VALUES ('$personId', '$articleId', '0');");
            $stmt->execute();
            header("Location: article.php?articleId=".$articleId);
    }else if ($like === "empty"){
        $stmt = $pdo->prepare("INSERT INTO `person-article` (`personId`, `articleId`, `like`) VALUES ('$personId', '$articleId', '1');");
        $stmt->execute();
        header("Location: article.php?articleId=".$articleId);
    }else{
        $stmt = $pdo->prepare("UPDATE `person-article` SET `like`= $like WHERE (`personId`=$personId AND `articleId`=$articleId);");
        $stmt->execute();
        header("Location: article.php?articleId=".$articleId);
    }
        
} 
else{
include('../includes/admin-else.php');
    
    
}
?>

