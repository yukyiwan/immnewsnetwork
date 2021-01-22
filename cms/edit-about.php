<?php
session_start();
if($_SESSION["userId"]== "1"){

    $aboutId = $_GET["aboutId"]; ?>
    <!DOCTYPE html>
    <html>
    	<head>
    	    <title>INN CMS | Edit About page</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS section to edit about page">
            <meta name="keywords" content="edit about page, update about page, about page historical updates">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="edit-about.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
    	</head>
    	
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Edit About Page</h2>
                <?php include('../includes/db-config.php');
                    $stmt = $pdo->prepare("SELECT * FROM `about` WHERE `aboutId` = $aboutId");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                <form action="process-edit-about.php" method="POST">
                	<fieldset>
                    	<legend>About INN:</legend>
                    	<textarea name="aboutText" required><?php echo($row["aboutText"]);?></textarea>
                	</fieldset>
                	<input type="hidden" name = "aboutId"  value ="<?php echo($row["aboutId"]);?>"/>	
                	<input type="submit" value = "Update About page"/>
            	</form> 
            </main>
        </body>
	</html>			
	
<?php }else{
include('../includes/admin-else.php');}
?>