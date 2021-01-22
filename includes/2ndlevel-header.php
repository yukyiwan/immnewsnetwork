<?php ?>
<header>
    
    <div id="readAsst">
    <input type="checkbox" id="switch" class="checkbox" /> 
    <label for="switch" class="toggle"></label> 
    </div>
    
    <img id=logo src="../images/logol.png" height="80"/>

        <nav>
            <ul>
                <li><a href="../index.php">Home</a> </li>
                <li><a href="../about.php">About</a> </li>
                <li><a href="../articles/catin.php?catInId=1">Industry</a> </li>
                <li><a href="../articles/catin.php?catInId=2">Technical</a> </li>
                <li><a href="../articles/catin.php?catInId=3">Career</a> </li>
                <?php if($_SESSION["userId"]== "1"){ ?>
                <li><a href="../contact.php">Contact</a> </li>
                <li><a href="../cms/cms-menu.php">CMS</a></li>
                <li><a href="../logout.php">Logout</a> </li>
                <?php }else if (isset($_SESSION["personId"])){?>
                <li><a href="../contact.php">Contact</a> </li>
                <li><a href="../logout.php">Logout</a> </li>
                <li><?php }else {?>
                <li><a href="../contact.php">Contact</a> </li>
                <li><a href="../register.php">Register</a></li>
                <li><a href="../login.php">Login</a></li> <?php }?>
            </ul>
        </nav>
</header>    


