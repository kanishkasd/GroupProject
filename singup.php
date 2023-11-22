<html>
    <head>
        <title>
                   Singup 
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="banner">
           <?php include_once'navbar.php' ?>

           <div class="login_form">
           <h1>Ceylon Electricity Bill Calculation System</h1>
                <form action="include/singup.inc.php" method="post">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name..">

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Your email..">

                    <label for="Uname">Username</label>
                    <input type="text" id="Uid" name="uId" placeholder="Your Email/Username..">

                    <label for="password">Password</label>
                    <input type="password" id="pwd" name="pwd" placeholder="Your password..">

                    <label for="Rpassword">Repeat Password</label>
                    <input type="password" id="pwd" name="pwdrepeat" placeholder="Re enter Your password..">
                
                    <button class="logbutton" name="submit" type="submit">Register</button>
                </form>
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                            echo'<div class = "error">Fill in the all fields!</div>';
                        }
                        elseif($_GET["error"]=="invaliduId"){
                            echo'<div class = "error">Enter the vaild user name!</div>';
                        }
                        elseif($_GET["error"]=="invalidEmail"){
                            echo'<div class = "error">Enter the vaild Email!</div>';
                        }
                        elseif($_GET["error"]=="passwordnotmatch"){
                            echo'<div class = "error">Password did not match!</div>';
                        }
                        elseif($_GET["error"]=="uIdtaken"){
                            echo'<div class = "error">User name alredy taken!</div>';
                        }
                        elseif($_GET["error"]=="stmtfaild"){
                            echo'<div class = "error"Somthing went worng!</div>';
                        }
                        elseif($_GET["error"]=="none"){
                            echo'<div class = "error"Account created successful!</div>';
                        }
                    
                    }
                ?>
                <p>Already have an account <a href="login.php">click here</a> 
        </div>

        </div>

    </body>