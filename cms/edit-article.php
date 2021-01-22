<?php
session_start();
if($_SESSION["userId"]== "1"){

    $articleId = $_GET["articleId"];
	include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `articleId` = $articleId");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);  ?>
    
    <!DOCTYPE html>
	<html>
    	<head>
    	    <title>INN CMS | Edit article</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS section to edit an article">
            <meta name="keywords" content="edit article, update article">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="process-register.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
    	</head>
    	
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Edit article <?php echo ($articleId) ?>:"<?php echo($row["aName"]);?>"</h2>
                <form action="process-edit-article.php" method="POST" enctype="multipart/form-data">
                	<fieldset>
                		<legend>Overview</legend>
                		<label for="catInId"> Category:</label>
                		<select name ="catInId" autofocus>
                                  <option value = "1">Industry</option>
                                  <option value = "2">Technical</option>  
                                  <option value = "3">Career</option>
                        </select></br>
                		<label for="aName"> Title:</label>
                		<input type="text" name="aName" value ="<?php echo($row["aName"]);?>" required/></br>
            			<label for="author">Author: </label>
            			<input type="text" name="author" value ="<?php echo($row["author"]);?>" required/></br>
            			<label for="date">Publish Date: </label>
            			<input type="date" name="date" value ="<?php echo($row["date"]);?>" required/><br>
            			<label for="link"> External source (URL):</label>
                	    <input type="URL" name="link" value ="<?php echo($row["link"]);?>" required/></br>
                	</fieldset>
                	<fieldset>
                    	<legend>Preview Text: </legend>
                    	<textarea name="preview" required><?php echo($row["preview"]);?></textarea>
                	</fieldset>
                	<fieldset>
                    	<legend>Full Text: </legend>
                    	<textarea name="text" required><?php echo($row["text"]);?></textarea>
                	</fieldset>
                	<fieldset>
                	<legend>Image: </legend>
                    <input type="file" name="articleImage"/>     
                	</fieldset>
                	<input type="hidden" name = "articleId"  value ="<?php echo($row["articleId"]);?>"/>	
                	<input type="submit" value = "Update article"/>
    	        </form>
	        </main>
    	</body>	
	</html>			
	
<?php
} 
else{
include('../includes/admin-else.php');}
?>