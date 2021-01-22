<?php
session_start();
if($_SESSION["userId"]== "1"){?>


    <!DOCTYPE html>
    	<html>
        	<head>
        	    <title> INN CMS | View Contacts </title>
        	    <meta charset="utf-8">
                <meta name="description" content="INN CMS section to view contact form submission">
                <meta name="keywords" content="contact form submission, contact us entries, contact records">
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
                    <h2>Articles directory</h2>
                    <?php
                	include('../includes/db-config.php');
                	$stmt = $pdo->prepare("	SELECT `contact`.`contactId`, `contact`.`fName`, `contact`.`lName`, `contact`.`email`, `contact`.`roleId`, `contact`.`time`, `contact-catin`.`catInId` FROM `contact` INNER JOIN `contact-catin` ON `contact`.`contactId` =`contact-catin`.`contactId` ORDER BY `contact`.`time` DESC;");
                	$stmt->execute(); ?>
                    
                    <table>
                    	<tr>
                        	<th>CID</th>
                        	<th>Name</th>
                        	<th>Email</th>
                        	<th>Role</th>
                        	<th>Category Interest</th>
                        	<th>Submission Time</th>
                    	</tr>
                    
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                    if($row["roleId"]==1){ 
                        $roleName = "Writer";
                    }else if($row["roleId"]==2){ 
                        $roleName = "Contributor";
                    }else{$roleName = "Administrator";}
                    
                    if($row["catInId"]==1){ 
                        $catInName = "Industry";
                    }else if($row["catInId"]==2){ 
                        $catInName = "Technical";
                    }else{$catInName = "Career";}
                    ?> 
                    
                        <tr>
                            <td><?php echo($row["contactId"]); ?></td>
                            <td><?php echo($row["fName"]." ".$row["lName"]); ?></td>
                            <td><?php echo($row["email"]); ?></td>
                            <td><?php echo($roleName); ?></td>
                            <td><?php echo($catInName); ?></td>
                            <td><?php echo($row["time"]); ?></td>                
                 		</tr>
             		<?php } ?>
             		</table> 
         	    </main>	
        	</body>
    	</html>
		
		
<?php }else{
include('../includes/admin-else.php');}
?>

