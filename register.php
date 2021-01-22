<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head> 
    <title>INN | Registration </title>    
    <meta charset="utf-8">
    <meta name="description" content="Become an INN member today to cast a like to your favorite content!"
    <meta name="keywords" content="register, registration, sign up">
    <?php include("includes/main-author.php"); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="register.php" />
    <?php include("includes/favicon.php"); ?>  
    <link rel="stylesheet" href="css/main.css">
</head>  

<body>
    <?php include("includes/header.php"); ?>
    <main>
        <section class="form">
        <h1>Registration</h1>
        <p>Become an INN member today to cast a "like" to your favorite content!  </p>
        <form action = "process-register.php" method="POST"> 
            <fieldset>  
            <legend>Personal details:</legend>
                <label for "fName"> First Name: </label>
                <input type = "text" name="fName" placeholder="Neil" autofocus="" required/> </br>
                <label for "lName"> Last Name: </label>
                <input type = "text" name="lName" placeholder="Armstrong"  required/></br>
                <label for "email"> Email: </label>
                <input type = "email" name = "email" placeholder="narmtrong@imm.com" required /> </br>
                <label for "password"> Password: </label>
                <input type = "password"  name = "password" required/> 
            </fieldset>
            <fieldset>  
                <legend>User type:</legend>
            <select name ="userId">
                          <option value = "1">Adminstrator</option>
                          <option value = "2">Other Users</option>
            </select>
            </fieldset>
            <input type="hidden" name="time" value="<?php echo date("Y-m-d h:i:s", time()); ?>" />
            <input type="submit" value="Register"/>
        </form>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
    </body>
    
   <script src="script/others.js"> </script>
    
</html>

