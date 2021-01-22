<?php
session_start();
if($_SESSION["userId"]== "1"){?>

    <!DOCTYPE html>
	<html>
    	<head>
    	    <title>INN CMS | Manage About Page</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS section to view About page historic entries for editing and updating">
            <meta name="keywords" content="about page historic updates, about page historical updates, about page past updates">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="view-about.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
    	</head>
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
        	<main>
            	<h1>Content Management System</h1>
                <h2>Manage About Page</h2>
                
                <?php include('../includes/db-config.php');
            	$stmt = $pdo->prepare("SELECT * FROM `about` ORDER BY `time` DESC;");
            	$stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                	echo("<p>");
                	echo($row["time"]."</br>".$row["aboutText"]."</br>"); 
                	?>
                	<a href="edit-about.php?aboutId=<?php echo($row["aboutId"]); ?>">Edit from this template</a>
             		<?php
             		echo("</p>"); } ?>
            </main> 
        </body>
	</html>			
		
<?php
} 
else{
include('../includes/admin-else.php');}
?>
