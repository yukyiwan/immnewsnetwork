<?php
    session_start();
	include('includes/db-config.php');
	$stmt = $pdo->prepare("SELECT * FROM `about` WHERE `aboutId`=(SELECT max(`aboutId`) FROM `about`);");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html> 
<html>
    <head>
        <!-- metadata -->
        <title>INN | About</title>
        <meta charset="utf-8">
        <meta name="description" content="Find out about who INN is and what we do.">
        <meta name="keywords" content="about, background, history, mission, vision, introduction">
        <?php include("includes/main-author.php"); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="about.php" />
        <?php include("includes/favicon.php"); ?>
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    
    <body>
        <?php include ("includes/header.php"); ?>
        <main>
        <section class="others">
        <h1>About us</h1>
        <p><?php echo($row["aboutText"]);?></p>
        </section>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
    <script src="script/others.js"> </script>
</html>