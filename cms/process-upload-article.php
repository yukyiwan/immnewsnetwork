<?php
session_start();
if($_SESSION["userId"]== "1"){
    
    $catInId = $_POST["catInId"];
    $aName = $_POST["aName"];
        $aAName = addslashes ($aName);
    $author = $_POST["author"];
        $aAuthor = addslashes ($author);
    $preview = $_POST["preview"];
        $aPreview = addslashes ($preview);
    $text = $_POST["text"];
        $aText = addslashes ($text);
     $date = $_POST["date"];
     $link = $_POST["link"];
    $uploaddir = "../articles/img/";
    $iFileName = preg_replace("/[^A-Za-z0-9\-\_\.]/", '', $_FILES["articleImage"]["name"]);
    $uploadfile = $uploaddir. basename($iFileName);

        include('../includes/db-config.php');
        
        $stmt = $pdo->prepare("INSERT INTO `article` (`articleId`, `catInId`, `aName`, `author`, `date`, `preview`, `text`, `link`, `featured`,`iFileName`) VALUES (NULL, '$catInId', '$aAName', '$aAuthor', '$date', '$aPreview', '$aText', '$link', '0', '$iFileName');");
        $stmt->execute();
        
        $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId`=(SELECT max(`articleId`) FROM `article`);");
    	$stmt->execute();
    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    	$rArticleId = $row["articleId"];
        
        if (move_uploaded_file($_FILES["articleImage"]["tmp_name"], $uploadfile)) {
        header("Location: manage-article.php");
        } else {
        echo ("Possible file upload error!</br>");
        echo ("Here is some more debugging info:");
        print_r($_FILES);
        }

} 
else{
include('../includes/admin-else.php');}
?>

