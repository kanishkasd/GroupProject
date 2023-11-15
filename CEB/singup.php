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

                    <label for="Rpassword">Repet Password</label>
                    <input type="password" id="pwd" name="pwdrepeat" placeholder="Re enter Your password..">
                
                    <button class="logbutton" name="submit" type="submit">register</button>
                </form>
                <p>Already have an account <a href="login.php">click here</a> 
        </div>

        </div>

    </body>