<?php
session_start();
    $fName = $_POST["fName"];
        $aFName = addslashes ($fName);
    $lName = $_POST["lName"]; 
        $aLName = addslashes ($lName);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userId = $_POST["userId"];
    $time= $_POST["time"];
    
    include('includes/db-config.php');
    
    $stmt = $pdo->prepare("SELECT * FROM `person` WHERE (`email`= '$email');");
    $stmt->execute();
    $entries=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             $entries +=1;}
    
    
    if ($entries==0){
        $stmt = $pdo->prepare ("INSERT INTO `person` (`personId`, `fName`, `lName`, `email`, `password`, `userId`, `time`) VALUES (NULL, '$aFName', '$aLName', '$email', '$password', '$userId', '$time');");
        $stmt->execute();
        ?> <!DOCTYPE html>
        <html>
        <head> 
            <title> INN | Successful Registration! </title>    
            <meta charset="utf-8">
            <meta name="description" content="Registration success page">
            <meta name="keywords" content="registration success, registration complete">
            <?php include("includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="process-register.php" />
            <?php include("includes/favicon.php"); ?>
        </head>  
        
        <body>
            <?php include("includes/header.php"); ?> 
            <main>
                <h1> Thank you for registering with INN! </h1>
            </main> 
            <?php include("includes/footer.php"); ?>
        </body>
        </html>
    <?php }else{
        ?> <!DOCTYPE html>
        <html>
            <head> 
                <title> INN | Registration Failure! </title>    
                <meta charset="utf-8">
                <meta name="description" content="Registration failure page">
                <meta name="keywords" content="registration failure, registration fail">
                <?php include("includes/main-author.php"); ?>
                <meta name="robots" content="noindex">
                <link rel="canonical" href="process-register.php" />
                <?php include("includes/favicon.php"); ?>
            </head>  
            
            <body>
                <?php include("includes/header.php"); ?> 
                <main>
                    <h1> This email has already been registered with INN! </h1>
                </main> 
                <?php include("includes/footer.php"); ?>
            </body>
        </html>
        
    <?php }

    
?>
