<?php  
session_start();?>

<!DOCTYPE html> 
    <html>
        <head>
            <title>INN | IMM News Network</title>    
            <meta charset="utf-8">
            <meta name="description" content="News, analysis and commentary from the IMM News Network (INN), one of the world's leading web development and interactive media publications">
            <meta name="keywords" content="inn, imm news network, news, analysis, commentary, web development, web dev, ux, ui, coding, interactive coding, sheridan college, imm, interactive media management">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php include("includes/main-author.php"); ?>
            <link rel="canonical" href="index.php" />
            <?php include("includes/favicon.php"); ?>
            <link rel="stylesheet" href="css/main.css">
        </head>
        <body>
            <?php include ("includes/header.php"); ?>   
            <main>
                <section id="welcome">
                    <h1>Welcome to INN!</h1>
                    <p> At IMM News Network (INN), we pool together the latest news, analysis and commentary from authoritative interactive media experts, many of whom are graduates from Sheridan College's Interactive Media Management (IMM) program. Register with us today to cast a "like" to your favorite content. Contact us if you'd like to become a writer, contributor or administrator of INN!  </p>
                </section>
                
                <section id="featured">
                    <h2>Featured Article</h2>
                    <?php
                        	include('includes/db-config.php');
                        	$stmt = $pdo->prepare("SELECT * FROM `article` WHERE `featured`=1;");
                        	$stmt->execute();
                        	$row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                            
                    <article>
                            <img class="artImg" src="articles/img/<?php echo($row["iFileName"]); ?>" width="1000"/>
                            <h3><a href="articles/article.php?articleId=<?php echo($row["articleId"]); ?>"> <?php echo($row["aName"]);?></a></h3>
                            <p><?php echo($row["date"]);?></p> 
                            <p><?php echo($row["preview"]);?></p> 
                    </article>
                </section>
                
                <section class="container">
                    <section class="block">
                        <h2> Industry </h2>
                            <?php
                          	include('includes/db-config.php');
                        	$stmt = $pdo->prepare("SELECT * FROM `article` WHERE `catInId`=1 ORDER BY `articleId` DESC;");
                        	$stmt->execute();
                        	$i=1;
                        	while(($i <= 3) && ($row = $stmt->fetch(PDO::FETCH_ASSOC))) {   
                        	    $i++;  ?>
                                <article class="article">
                                    <img class="artImg" src="articles/img/<?php echo($row["iFileName"]); ?>"/>
                                    <h3><a href="articles/article.php?articleId=<?php echo($row["articleId"]); ?>"> <?php echo($row["aName"]);?></a></h3>
                                    <p id="industry">By <?php echo($row["author"]);?></p>
                                    <p><?php echo($row["date"]);?></p> 
                                    <p><?php echo($row["preview"]);?></p> 
                                </article>
                            <?php } ?>
                            
                    </section>
                    
                    <section class="block">
                        <h2> Techincal </h2>
                        <?php
                          	include('includes/db-config.php');
                        	$stmt = $pdo->prepare("SELECT * FROM `article` WHERE `catInId`=2 ORDER BY `articleId` DESC;");
                        	$stmt->execute();
                        	$i=1;
                        	while(($i <= 3) && ($row = $stmt->fetch(PDO::FETCH_ASSOC))) { 
                        	     $i++; ?>
                                <article class="article">
                                    <img class="artImg" src="articles/img/<?php echo($row["iFileName"]); ?>"/>
                                    <h3><a href="articles/article.php?articleId=<?php echo($row["articleId"]); ?>"> <?php echo($row["aName"]);?></a></h3>
                                    <p id="tech">By <?php echo($row["author"]);?></p> 
                                    <p><?php echo($row["date"]);?></p> 
                                    <p><?php echo($row["preview"]);?></p> 
                                </article>
                            <?php } ?>
                    </section>
                
                    <section class="block">
                        <h2> Career </h2>
                        <?php
                        	include('includes/db-config.php');
                        	$stmt = $pdo->prepare("SELECT * FROM `article` WHERE `catInId`=3 ORDER BY `articleId` DESC;");
                        	$stmt->execute();
                        	$i=1;
                        	 while(($i <= 3) && ($row = $stmt->fetch(PDO::FETCH_ASSOC))) {   
                        	    $i++; ?>
                                <article class="article">
                                    <img class="artImg" src="articles/img/<?php echo($row["iFileName"]); ?>"/>
                                    <h3><a href="articles/article.php?articleId=<?php echo($row["articleId"]); ?>"> <?php echo($row["aName"]);?></a></h3>
                                    <p id="career">By <?php echo($row["author"]);?></p> 
                                    <p><?php echo($row["date"]);?></p> 
                                    <p><?php echo($row["preview"]);?></p> 
                                </article>
                            <?php } ?>
                    </section>
                </section>
            
                <section class="others">
                    <h2>Visitor Statistics</h2>
                    <table>
                        <tr>
                            <th>Month</th>
                            <th>No. of Visitors</th>
                        </tr>
                    </table>
                </section> 
            
                <section class="others">
                    <h2>Video</h2>
                    <iframe class="video" src="https://www.youtube.com/embed/cGA8yaU6zKE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </section>
            </main>
            <?php include ("includes/footer.php"); ?>
        </body>
        <script src="script/main.js"> </script>
        <script src="script/index.js"> </script>
</html>