<?php
    session_start();
    $catInId = $_GET["catInId"];
    if($catInId==1){ 
    $catInName = "Industry Moves & Updates";
    $catInMeta = "industry, it, tech, information technology, internet";
    }else if($catInId==2){ 
    $catInName = "Technical News & Analysis";
    $catInMeta = "technical, tech, javascript, html, css, php, mysql, sql, phpmyadmin, database, apps";
    }else{
    $catInName = "Career & Workplace Insights";
    $catInMeta = "career advice, workplace, work, office";
    }

?>

<!DOCTYPE html> 
<html>
    <head>
        <title>INN | <?php echo($catInName);?> </title>
        <meta charset="utf-8">
        <meta name="description" content="Full collection of <?php echo($catInName);?> hosted by INN">
        <meta name="keywords" content="<?php echo($catInMeta);?> news">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="catin.php?catInId=<?php echo($catInId); ?>">
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <?php include("../includes/2ndlevel-header.php"); ?>
        <main>
                <section class="articleBox">
                <h2><?php echo($catInName);?></h2>
                <?php
            	include('../includes/db-config.php');
                $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `catInId`= $catInId ORDER BY `date` DESC;");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <article>
                    <img class="artImg" src="img/<?php echo($row["iFileName"]); ?>" width="200"/>
                        <h3><a href="article.php?articleId=<?php echo($row["articleId"]); ?>"> <?php echo($row["aName"]);?></a></h3>
                        <p><?php echo($row["date"]);?></p> 
                        <p><?php echo($row["preview"]);?></p> 
                    </article>
                    <?php } ?>   
            </section>
        </main>
        <?php include("../includes/footer.php"); ?>
        
    </body>
    <script src="../script/main.js"> </script>
    <script src="../script/simple.js"> </script>
</html>