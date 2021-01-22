<?php 
session_start();
 $articleId = $_GET["articleId"];
 include('../includes/db-config.php');
 $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId`= $articleId;");
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html> 
<html>
        <head>
            <title> INN | <?php echo($row["aName"]);?></title>
            <meta charset="utf-8">
            <meta name="description" content="An INN article penned by <?php echo($row["author"]);?>: <?php echo($row["preview"]);?>">
            <meta name="keywords" content="<?php echo($row["aName"]);?>, <?php echo($row["author"]);?>">
            <meta name="author" content="<?php echo($row["author"]);?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="canonical" href="article.php?articleId=<?php echo($row["articleId"]); ?>" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            <link rel="stylesheet" href="../css/main.css">
        
        </head>
        <body>
            <?php include("../includes/2ndlevel-header.php"); 
                $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId`= $articleId;");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            	if($row["catInId"]==1){ 
                    $catInName = "Industry Moves & Updates";
                    $id = "id=\"industry\"";
                    
                }else if($row["catInId"]==2){ 
                    $catInName = "Technical News & Analysis";
                    $id = "id=\"tech\"";
                }else{
                    $catInName = "Career & Workplace Insights";
                    $id = "id=\"career\"";} ?>
            <main>    
                <section class="articleBox">
                <h3><a href="../articles/catin.php?catInId=<?php echo($row["catInId"]); ?>"><?php echo ($catInName); ?></a></h3> 
                <?php       
                        $personId = $_SESSION["personId"];
                        $stmt = $pdo->prepare("SELECT * FROM `person-article` WHERE (`articleId`=$articleId AND `like`= 1);");
                        $stmt->execute();
                        $totalLikes=0;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                             $totalLikes +=1;
                        }
                        $stmt = $pdo->prepare("SELECT * FROM `person-article` WHERE (`personId`= $personId AND `articleId`=$articleId);");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                if(isset($_SESSION["personId"])){
            
                    if (isset($row["like"]) && $row["like"]==="1"){
                        ?><form action="process-like.php?articleId=<?php echo($articleId); ?>" method="POST">
                    	<input type = "hidden" name = "articleId" value = "$articleId">
                        <input type = "hidden" name = "like" value = "0">
                    	<input type ="submit" value = "unlike"/>
                    
                	<?php }else if(isset($row["like"]) && $row["like"]==="0"){
                        ?><form action="process-like.php?articleId=<?php echo($articleId); ?>" method="POST">
                    	<input type = "hidden" name = "articleId" value = "$articleId">
                        <input type = "hidden" name = "like" value = "1">
                    	<input type ="submit" value = "like"/>
                    
                	<?php }else{
                	    ?><form action="process-like.php?articleId=<?php echo($articleId); ?>" method="POST">
                    	<input type = "hidden" name = "articleId" value = "$articleId">
                    	<input type = "hidden" name = "like" value = "empty">
                    	<input type="submit" value = "like"/>
                    	
                	<?php }
                }
                echo($totalLikes." people like this"); 
                ?> </form> <?php
                $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId`= $articleId;");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>

                <article>
                    <img class="artImg" src="../articles/img/<?php echo($row["iFileName"]); ?>" width="1000"/>
                    <h2><?php echo($row["aName"]);?></h2>
                    <p <?php echo($id);?>>By <?php echo($row["author"]);?></p> 
                    <p><?php echo($row["date"]);?></p> 
                    <p> <a href="<?php echo($row["link"]);?>">External source</a> </p> 
                    <p><?php echo($row["preview"]);?></p> 
                    <p><?php echo($row["text"]);?></p> 
                    <a href="../index.php"> Go back to Homepage </a> 
                </article>
                </section>
                
        </main>
        <?php include("../includes/footer.php"); ?>
    </body>
    <script src="../script/main.js"> </script>
    <script src="../script/simple.js"> </script>

</html>
