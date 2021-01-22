<?php
session_start();
if($_SESSION["userId"]== "1"){?>
    
    <!DOCTYPE html>
    <html>
    	<head>
    	    <title>INN CMS | Menu</title>
    	    <meta charset="utf-8">
            <meta name="description" content="INN CMS Menu">
            <meta name="keywords" content="cms menu, cms table of content, cms index">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="cms-menu.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
    	</head>
    	<body>    
            <?php include("../includes/cms-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Menu</h2>
                <ol>
                    <li>Upload article <a href="upload-article.php">[link]</a></li>
                    <li>Edit, set featured or delete article <a href="manage-article.php">[link]</a></li>
                    <li>View and edit About page <a href="manage-about.php">[link]</a></li>
                    <li>View contact form submissions <a href="view-contacts.php">[link]</a></li> 
                </ol> 
            </main>
        </body>
    </html>
	
<?php
} 
else{
include('../includes/admin-else.php');}
?>