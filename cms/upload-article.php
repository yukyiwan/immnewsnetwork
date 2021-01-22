<?php
session_start();
if($_SESSION["userId"]== "1"){?>
    


<!DOCTYPE html>
	<html>
    	<head>
    	    <title>INN CMS | Upload Article</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS page to upload an article">
            <meta name="keywords" content="add article, adding article, create article, creating article, upload article, uploading article">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="upload-article.php" />
    
    	</head>
    	<body>
        	<?php include("../includes/cms-header.php"); ?>
        	<main>
            	<h1>Content Management System</h1>
            	<h2>Upload Article</h2>
        		
            	<form action="process-upload-article.php" method="POST" enctype="multipart/form-data">
                	<fieldset>
                		<legend>Overview</legend>
                		<label for="catInId"> Category:</label>
                		<select name ="catInId">
                                  <option value = "1">Industry</option>
                                  <option value = "2">Technical</option>  
                                  <option value = "3">Career</option>
                        </select></br>
                		<label for="aName"> Title:</label>
                		<input type="text" name="aName" required/></br>
                		<label for="author">Author: </label>
                		<input type="text" name="author" required/></br>
                		<label for="date">Publish Date: </label>
                    	<input type="date" name="date" required/></br>
                		<label for="link"> External source (URL):</label>
                    	<input type="URL" name="link" required/></br>
                	</fieldset>
                	<fieldset>
                    	<legend>Preview Text: </legend>
                    	<textarea name="preview" required></textarea>
                	</fieldset>
                	<fieldset>
                    	<legend>Full Text: </legend>
                    	<textarea name="text" required></textarea>
                	</fieldset>
                	<fieldset>
                    	<legend>Image: </legend>
                        <input type="file" name="articleImage" required/>     
                	</fieldset>
                	<input type="submit" value = "Upload article"/>
            	</form> 
            <main>
    	</body>
	</html>
	
    
<?php
} 
else{
include('../includes/admin-else.php');}
?>
