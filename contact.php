<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>
    <head> 
        <title>INN | Contact</title>    
        <meta charset="utf-8">
        <meta name="description" content="Let us know if you'd like to become a writer, contributor or administrator of INN!">
        <meta name="keywords" content="contact form, query, queries, inquiry, inquiries, enquiries, enquiry, question">
        <?php include("includes/main-author.php"); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="contact.php" />
        <?php include("includes/favicon.php"); ?>
        <link rel="stylesheet" href="css/main.css">
    </head>  
    
    <body>
        <?php include ("includes/header.php"); ?>
        <main>
            <section class="form">
            <h1> Contact INN </h1>
            <p>Let us know if you'd like to become a writer, contributor or administrator of INN!  </p>
            
            <form name="cForm" action = "process.php" method="POST"> 
                <fieldset>  
                <legend>Contact details:</legend>
                    <div class="newLine"><label for "fName"> First Name: </label>
                    <input  type = "text"  name="fName" id="fName" placeholder="Neil" autofocus="" required /> </div>
                    <div class="newLine"><label for "lName"> Last Name: </label>
                    <input type = "text" name="lName" id="lName" placeholder="Armstrong" required /></div>
                    <div class="newLine"><label for "email"> Email: </label>
                    <input  type = "email" name = "email" id="email" placeholder="narmtrong@imm.com" required /> </div>
                </fieldset>
            
                <fieldset>
                <legend>Category Interests</legend>
                    <input type="checkbox" id= "catInId" name="catInId[]" value="1"/>
                    <label for "catInId[]">Industry</label>
                    <input type="checkbox" id= "catInId" name="catInId[]" value="2"/>
                    <label for "catInId[]">Technical</label>
                    <input type="checkbox" id= "catInId" name="catInId[]" value="3"/>
                    <label for "catInId[]">Career</label>
                </fieldset>
            
                <fieldset>  
                    <legend>Your Role:</legend>
                <select name ="roleId" id="roleId">
                        <option value = "1">Writer</option>
                        <option value = "2">Contributor</option>
                        <option value = "3">Adminstrator</option>
                    </select>
                </fieldset>
            
                <input type="hidden" name="time" id="time" value="<?php echo date("Y-m-d h:i:s", time()); ?>" />
                
                <input type="submit" value = "Submit"/>
            </form>
            </section>
        </main>
        <?php include ("includes/footer.php"); ?>
    </body>
    <script src="script/others.js"> </script>
    <script src="script/contact.js"> </script>
</html>



