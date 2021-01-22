<?php
session_start();
if($_SESSION["userId"]== "1"){?>

    <!DOCTYPE html>
	<html>
    	<head>
    	    <title> INN CMS | Manage Articles</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS section to manage article editing, featured setting and deletion">
            <meta name="keywords" content="cms menu, cms table of content, cms index">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="manage-articles.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            
            <style>
            table, th, td {
              border: 1px solid black;
            }
            </style>
    	</head>
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Manage Articles</h2>
            	<a href="upload-article.php">Upload article</a></br></br>
            	<table>
                	<tr>
                    	<th>AID</th>
                    	<th>Publish Date</th>
                    	<th>Category</th>
                    	<th>Title</th>
                    	<th>Edit</th>
                        <th>Delete</th>
                        <th>Feature</th>                	
                        <th>Webpage</th>
                	</tr>
                
                    <?php include('../includes/db-config.php');
                    $stmt = $pdo->prepare("SELECT * FROM `article`");
                	$stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                    	$featured="";
                        if($row["featured"]==1){ 
                            $featured = "***";}
                    	if($row["catInId"]==1){ 
                            $catInName = "Industry";
                        }else if($row["catInId"]==2){ 
                            $catInName = "Technical";
                        }else{$catInName = "Career";}?>
                    	
                	<tr>
                        <td><?php echo($row["articleId"]); ?></td>
                        <td><?php echo($row["date"]); ?></td>
                        <td><a href="../articles/catin.php?catInId=<?php echo($row["catInId"]); ?>"><?php echo($catInName); ?></a></td>
                    	<td><b><?php echo($featured); ?><?php echo($row["aName"]); ?><?php echo($featured); ?></a></b></td>
                    	<td><a href="edit-article.php?articleId=<?php echo($row["articleId"]); ?>">[edit]</a></td>
                 		<td><a href="delete-article.php?articleId=<?php echo($row["articleId"]); ?>">[delete]</a></td>    	
                    	<td><a href="set-featured.php?articleId=<?php echo($row["articleId"]); ?>">[feature]</a></td>
                    	<td><a href="../articles/article.php?articleId=<?php echo($row["articleId"]); ?>">[hyperlink]</a></td>
             		</tr>
                	<?php } ?>
             	</table>
             	<p>***currently featured article***</p>
         	</main>
    	</body>
	</html>		
		
<?php }else{
include('../includes/admin-else.php');}
?>
