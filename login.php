<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>INN | Login </title>    
        <meta charset="utf-8">
        <meta name="description" content="Log in to INN to cast a like to your favorite content!"
        <meta name="keywords" content="login, log in, log on, sign in">
        <?php include("includes/main-author.php"); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="login.php" />
        <?php include("includes/favicon.php"); ?> 
        <link rel="stylesheet" href="css/main.css">
    </head>  
    
    <body>
        <?php include("includes/header.php"); ?>
        <main>
            <section class="form">
            <h1>Login</h1>
            <form action="process-login.php" method="POST"> 
                <div class="newLine"><label for "email">Registered email: </label>
                <input type="email" name="email" autofocus="" required/></div>
                <div class="newLine"><label for "password">Password: <label for "email">
                <input type="password" name="password" required/></div>
                <input type="submit" value = "Login"/>   
            </form>
            </section>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
    <script src="script/others.js"> </script>
</html>