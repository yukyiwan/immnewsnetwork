<?php

session_start();
if($_SESSION["userId"]== "1"){

    $articleId = $_GET["articleId"]; ?>
    <!DOCTYPE html>
	<html>
    	<head>
    	    <title>INN CMS | Set Featured</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS section to set featured article">
            <meta name="keywords" content="set featured article, reset featured article, make featured article">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="set-featured.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
    	</head>
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Set Featured Article</h2>
                <?php include('../includes/db-config.php');
                $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId` = $articleId");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                
                Do you want to set <?php echo ("\"".$row["aName"]."\"") ?> as the featured article?
                <form action="process-set-featured.php" method="POST">
                	<input type="hidden" name="articleId" value="<?php echo($row["articleId"]);?>"></br>
                	<input type="submit" value="Set featured" />
                </form> </br>
                
                <article>
                    <img src="../articles/img/<?php echo($row["iFileName"]); ?>" width="500"/>
                    <h3> <?php echo($row["aName"]); ?> </h3> <?php
                    echo($row["author"]);
                    echo("</br>");
                    echo($row["date"]);
                    echo("</br>");
                    echo($row["preview"]);
                    echo("</br>"); 
                    echo($row["text"]);
                    echo("</br>");  ?>
                </article>
    	    </main>
    	</body>
	</html>		
<?php
} 
else{
include('../includes/admin-else.php');}
?>

