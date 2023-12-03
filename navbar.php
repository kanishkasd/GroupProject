<div class="navbar">
    <img src="./assets/images/logo.jpg" class="logo">
    <ul>
        <li><a href="index.php" target="_blank">Home</a></li>
        <li><a href="dashboard.php" target="_blank">Dashboard</a></li>
        <li><a href="about us.php" target="_blank">About us</a></li>
        <li><a href="contact us.php" target="_blank">Contact us</a></li>
        <?php
        if (isset($_SESSION["user_uid"])) {
            echo '<li><a href="#">' . $_SESSION["user_uid"] . ' !</a></li>';
            echo '<li><a href="include/logout.inc.php">Logout</a></li>';
        } else {
            echo '<li><a href="login.php">login</a></li>';
        }
        ?>
        </li>
    </ul>
</div>
<hr style="margin-bottom: 8px;">