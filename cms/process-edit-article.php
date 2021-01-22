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
    $articleId=$_POST["articleId"];
    $uploaddir = "../articles/img/";
    $iFileName = preg_replace("/[^A-Za-z0-9\-\_\.]/", '', $_FILES["articleImage"]["name"]);
    $uploadfile = $uploaddir. basename($iFileName);

    if (move_uploaded_file($_FILES["articleImage"]["tmp_name"], $uploadfile)) {
    include('../includes/db-config.php');
    $stmt = $pdo -> prepare ("UPDATE `article` SET `catInId` = '$catInId', `aName` = '$aAName', `author` = '$aAuthor', `date` = '$date', `preview` = '$aPreview', `text` = '$aText', `link` = '$link', `iFileName`='$iFileName' WHERE `article`.`articleId` = $articleId");
    $stmt -> execute();
    header("Location: manage-article.php");
    } else {
    include('../includes/db-config.php');
    $stmt = $pdo -> prepare ("UPDATE `article` SET `catInId` = '$catInId', `aName` = '$aAName', `author` = '$aAuthor', `date` = '$date', `preview` = '$aPreview', `text` = '$aText', `link` = '$link' WHERE `article`.`articleId` = $articleId");
    $stmt -> execute();
    echo ("<p><b>Article successfully updated. Ignore the below message if you intended NOT to update the image.</b></p><a href=\"manage-article.php\">Go back to the article overview</a></br>");
    echo ("Possible file upload error, if you intended to upload an image. Here is some more debugging info:");
    print_r($_FILES);
    }

}else{
include('../includes/admin-else.php');}
?>

