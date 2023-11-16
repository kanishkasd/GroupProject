<html>
    <head>
        <title>
                   login 
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="banner">
           <?php include_once'navbar.php' ?>

           <div class="login_form">
           <h1>Ceylon Electricity Bill Calculation System</h1>
                <form action="include/login.inc.php" method="post">
                    <label for="Uname">Username</label>
                    <input type="text" id="Uid" name="Username" placeholder="Your Email/Username..">

                    <label for="Password">Password</label>
                    <input type="password" id="Pwd" name="Password" placeholder="Your password..">
                
                    <button class="logbutton" name="submit" type="submit">Login</button>
                </form>
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                            echo'<div class = "error">Fill in the all fields!</div>';
                        }
                        elseif($_GET["error"]=="wronglogin"){
                            echo'<div class = "error">Invalid details! Please enter the vaild details</div>';
                        }
                        elseif($_GET["error"]=="stmtfaild"){
                            echo'<div class = "error"Somthing went worng!</div>';
                        }
                        elseif($_GET["error"]=="none"){
                            echo'<div class = "error"login successful!</div>';
                        }
                    
                    }
                ?>
                <p>Create a new account <a href="singup.php">click here</a> 
        </div>

        </div>

    </body>
    </html>