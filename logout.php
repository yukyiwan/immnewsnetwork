<?php 
	session_start();  
 	session_destroy();
 	
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>INN | Successfully logout! </title>
        <meta charset="utf-8">
        <meta name="description" content="Logout from INN">
        <meta name="keywords" content="logout, log out, sign out">
        <?php include("includes/main-author.php"); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <link rel="canonical" href="logout.php" />
        <?php include("includes/favicon.php"); ?>
        <link rel="stylesheet" href="css/main.css">
    </head>  
    
    <body>
        <header>
            <section id="readAsst">
            <input type="checkbox" id="switch" class="checkbox" /> 
            <label for="switch" class="toggle"></label> 
            </section>
        
            <img src="images/logol.png" height="80"/>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a> </li>
                    <li><a href="about.php">About</a> </li>
                    <li><a href="articles/catin.php?catInId=1">Industry</a></li>
                    <li><a href="articles/catin.php?catInId=2">Technical</a></li>
                    <li><a href="articles/catin.php?catInId=3">Career</a></li>
                    <li><a href="contact.php">Contact</a> </li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
                <section>
                <h1 style="color:white">Successfully logout! </h1>
                </section>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
    
    <script src="script/simple.js"> </script>
</html>