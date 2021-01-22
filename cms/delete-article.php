<?php

session_start();
if($_SESSION["userId"]== "1"){

    $articleId = $_GET["articleId"];
    ?>
    
    <!DOCTYPE html>
    <html>
    	<head>
    	    <title>INN CMS | Delete article</title>
        	<meta charset="utf-8">
            <meta name="description" content="INN CMS INN CMS section to delete an article">
            <meta name="keywords" content="delete article">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="process-register.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
    	</head>
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
            <main>
            	<h1>Content Management System</h1>
            	<h2>Delete Article</h2>
                <?php
        	    include('../includes/db-config.php');
                $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId` = $articleId");
                $stmt->execute(); 
                $row = $stmt->fetch(PDO::FETCH_ASSOC);?>
                Do you really want to delete "<?php echo ($row["aName"]); ?>"?
                <form action="process-delete-article.php" method="POST">
                	<input type="hidden" name="articleId" value="<?php echo($row["articleId"]);?>">
                	<input type="submit" value="CONFIRM DELETION" />
                </form></br>
                <article>
                    <img src="../articles/img/<?php echo ($row["iFileName"]); ?>" height="500"/>
                    <?php 
                    echo("<h2>".$row["aName"]."</h2>");
                    echo($row["author"]);
                    echo("</br>");
                    echo($row["date"]);
                    echo("</br>");
                    echo($row["preview"]);
                    echo("</br>");
                    echo($row["text"]); ?>
           	    </article>
            </main>
    	</body>
    </html>	
    
<?php } 
else{
include('../includes/admin-else.php');}
?>
